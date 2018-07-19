<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/whitelist.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';

    // Get an array containing all column names of a table in a database
    function get_column_names($dbh, $tableName)
    {
        $columns = array();
        $stmt = $dbh->prepare('SELECT * FROM information_schema.columns WHERE table_name = :name');
        $stmt->bindParam(':name', $_GET['name']);

        if (!$stmt->execute()) {
            throw new PDOException($stmt->errorInfo()[2]);
        }

        // Iterate over all columns of the table
        foreach ($smtp->fetch() as $dbLine) {
            array_push($columns, $dbLine['column_name']);
        }

        return $columns;
    }

    // Get the PDO instance for a database
    function get_dbh($dbhName)
    {
        // Load .env file
        load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

        // Limit table access
        $whiteList = array($_ENV['PGSQL_DATABASE'], 'server');

        if (in_array($dbhName, $whiteList)) {
            return new PDO('pgsql:host='.$_ENV['PGSQL_HOST'].';port='.$_ENV['PGSQL_PORT'].';dbname='.$dbhName, $_ENV['PGSQL_USERNAME'], $_ENV['PGSQL_PASSWORD']);
        } else {
            throw new Exception('"'.$dbhName.'" is not whitelisted!');
        }
    }

    function get_row_count($dbh, $table)
    {
        global $tableWhitelist;

        if (!in_array($table, array_keys($tableWhitelist))) {
            throw new Exception('"'.$table.'" is not whitelisted!');
        }

        $dbhQuery = $dbh->query('SELECT COUNT(*) FROM '.$table);

        if ($dbhQuery) {
            $rowCount = $dbhQuery->fetchColumn();

            return $rowCount;
        } else {
            return false;
        }
    }

    // Get an array containing the result of a SELECT SQL statement
    function get_rows($dbh, $table, $columns, $limit = null, $offset = null, $orderBys = null)
    {
        global $tableWhitelist;

        if (!in_array($table, array_keys($tableWhitelist))) {
            throw new Exception('"'.$table.'" is not whitelisted!');
        }

        $rows = array();
        $columnString = '';

        foreach ($columns as $column) {
            if (!in_array($column, $tableWhitelist[$table])) {
                throw new Exception('"'.$column.'" is not whitelisted!');
            }

            if ($columnString != '') {
                $columnString .= ', ';
            }

            $columnString .= $column;
        }

        $sql = 'SELECT '.$columnString.' FROM '.$table;

        if (isset($orderBys)) {
            $orderByString .= ' ORDER BY ';

            // Support ORDER BY for multiple columns
            foreach ($orderBys as $orderBy) {
                foreach ($orderBy as $column => $direction) {
                    if (!in_array($column, $tableWhitelist[$table])) {
                        throw new Exception('"'.$column.'" is not whitelisted!');
                    }

                    if (!in_array($direction, ['ASC', 'DESC'])) {
                        throw new Exception('"'.$direction.'" is neither "ASC" nor "DESC"!');
                    }

                    if ($orderByString != null) {
                        $orderByString .= ', ';
                    }

                    $orderByString .= $column.' '.$direction;
                }
            }

            $sql .= $orderByString;
        }

        // Add optional parameters
        if ($limit) {
            $sql .= ' LIMIT '.filter_var($limit, FILTER_SANITIZE_NUMBER_INT);
        }

        if ($offset) {
            $sql .= ' OFFSET '.filter_var($offset, FILTER_SANITIZE_NUMBER_INT);
        }

        // Run the SQL statement
        $stmt = $dbh->prepare($sql);

        if (!$stmt->execute()) {
            throw new PDOException($stmt->errorInfo()[2]);
        }

        // Add each row to array
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($rows, $result);
        }

        return $rows;
    }

    function get_row_for_current_ip($dbh, $tableName)
    {
        global $tableWhitelist;

        if (!in_array($tableName, array_keys($tableWhitelist))) {
            throw new Exception('"'.$tableName.'" is not whitelisted!');
        }

        $sql = $dbh->prepare('SELECT '.$tableName.' FROM :from WHERE ip = :ip');
        $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

        if (!$stmt->execute()) {
            throw new PDOException($stmt->errorInfo()[2]);
        }

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    function init_table($dbh, $tableName)
    {
        $columnConfig = null;
        $sqlIntegration = null;

        switch ($tableName) {
            case 'dj_song_suggestions':
                $columnConfig = '
                    id serial PRIMARY KEY,
                    title character varying(100) DEFAULT \'n/a\'::character varying,
                    artist character varying(100) DEFAULT \'n/a\'::character varying,
                    album character varying(100) DEFAULT \'n/a\'::character varying,
                    comment character varying(250) DEFAULT \'n/a\'::character varying,
                    ip character varying(64) NOT NULL,
                    datetime timestamp without time zone NOT NULL,
                    approved boolean DEFAULT false NOT NULL';
                $sqlIntegration = 'INSERT INTO surveys (name, open) VALUES (\'dj_song_suggestions\', false);';
                break;
            case 'surveys':
                $columnConfig = '
                    id serial PRIMARY KEY,
                    name character varying(75) NOT NULL,
                    open boolean DEFAULT false NOT NULL';
                break;
            default:
                throw new Exception('"'.$tableName.'" has no deployable configuration!');
        }

        $tableExists = table_exists($dbh, $tableName);
        $stmt = $dbh->query('CREATE TABLE IF NOT EXISTS '.$tableName.' ('.$columnConfig.');');

        if (!$stmt) {
            throw new PDOException('Could not create table "'.$tableName.'".');
        }

        if (!is_null($sqlIntegration) && !$tableExists) {
            $stmt = $dbh->query($sqlIntegration);

            if (!$stmt) {
                throw new PDOException('Could not execute SQL integration instruction "'.$sqlIntegration.'".');
            }
        }
    }

    function table_exists($dbh, $tableName)
    {
        return $dbh
            ->query('SELECT EXISTS (SELECT 1 FROM pg_tables WHERE schemaname = \'public\' AND tablename = \''.$tableName.'\')')
            ->fetch()['exists'];
    }

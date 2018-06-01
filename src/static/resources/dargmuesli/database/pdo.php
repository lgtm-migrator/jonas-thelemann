<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';

    // Get an array containing all column names of a table in a database
    function getColumnNames($dbh, $tableName)
    {
        $columns = array();

        // Iterate over all columns of the table
        foreach ($dbh->query('SELECT * FROM information_schema.columns WHERE table_name = \''.$_GET['name'].'\'') as $dbLine) {
            array_push($columns, $dbLine['column_name']);
        }

        return $columns;
    }

    // Get the PDO instance for a database
    function getDbh($dbhName)
    {
        // Load .env file
        loadEnvFile($_SERVER['SERVER_ROOT'].'/credentials');

        // Limit table access
        $whiteList = array($_ENV['PGSQL_DATABASE'], 'server');

        if (in_array($dbhName, $whiteList)) {
            return new PDO('pgsql:host='.$_ENV['PGSQL_HOST'].';port='.$_ENV['PGSQL_PORT'].';dbname='.$dbhName, $_ENV['PGSQL_USERNAME'], $_ENV['PGSQL_PASSWORD']);
        } else {
            throw new Exception('"'.$dbhName.'" is not whitelisted!');
        }
    }

    function getRowCount($dbh, $table)
    {
        $dbhQuery = $dbh->query('SELECT COUNT(*) FROM "'.$table.'"');

        if ($dbhQuery) {
            $rowCount = $dbhQuery->fetchColumn();

            return $rowCount;
        } else {
            return false;
        }
    }

    // Get an array containing the result of a SELECT SQL statement
    function getRows($dbh, $table, $columns, $limit = null, $offset = null, $orderBys = null)
    {
        $rows = array();
        $columnString = '';

        foreach ($columns as $column) {
            if (!$columnString == '') {
                $columnString .= ', ';
            }

            $columnString .= $column;
        }

        $sql = 'SELECT '.$columnString.' FROM "'.$table.'"';

        if (isset($orderBys)) {
            $sql .= ' ORDER BY ';

            // Support ORDER BY for multiple columns
            foreach ($orderBys as $orderBy) {
                //$orderByKeys = array_keys($orderBy);
                //var_dump($orderByKeys);

                foreach ($orderBy as $column => $direction) {
                    // if (array_search($column, $orderByKeys) > 0) {
                    //     $sql .= ', ';
                    // }

                    $sql .= $column.' '.$direction;
                }
            }
        }

        // Add optional parameters
        if ($limit) {
            $sql .= ' LIMIT '.$limit;
        }

        if ($offset) {
            $sql .= ' OFFSET '.$offset;
        }

        // Run the SQL statement
        $sth = $dbh->prepare($sql);
        $sth->execute();

        // Add each row to array
        while ($result = $sth->fetch(PDO::FETCH_ASSOC)) {
            array_push($rows, $result);
        }

        return $rows;
    }

    function getRowForCurrentIp($dbh, $tableName)
    {
        $sql = $dbh->prepare('SELECT * FROM "'.$tableName.'" WHERE ip=\''.$_SERVER['REMOTE_ADDR'].'\'');
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    function initTable($dbh, $tableName, $columnConfig = null)
    {
        if (!$columnConfig) {
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
        }

        return $dbh->query("CREATE TABLE IF NOT EXISTS $tableName ($columnConfig);");
    }

    function tableExists($dbh, $tableName)
    {
        return $dbh
            ->query("SELECT EXISTS (SELECT 1 FROM pg_tables WHERE schemaname='public' AND tablename='$tableName')")
            ->fetch()['exists'];
    }

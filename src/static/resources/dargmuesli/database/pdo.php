<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/whitelist.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';

    load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

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

        $stmt = $dbh->prepare('SELECT * FROM '.$tableName.' WHERE ip = :ip');
        $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

        if (!$stmt->execute()) {
            throw new PDOException($stmt->errorInfo()[2]);
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function init_table($dbh, $tableName)
    {
        $columnConfig = null;
        $sqlIntegration = null;

        switch ($tableName) {
            case 'a_level_magazine_awards':
                $columnConfig = '
                    id serial PRIMARY KEY NOT NULL,
                    gotteskind character varying(100) DEFAULT \'n/a\'::character varying,
                    partyraucher character varying(100) DEFAULT \'n/a\'::character varying,
                    frisur character varying(100) DEFAULT \'n/a\'::character varying,
                    mami character varying(100) DEFAULT \'n/a\'::character varying,
                    sarkasmus character varying(100) DEFAULT \'n/a\'::character varying,
                    träumer character varying(100) DEFAULT \'n/a\'::character varying,
                    shopaholik character varying(100) DEFAULT \'n/a\'::character varying,
                    markenwerbetafel character varying(100) DEFAULT \'n/a\'::character varying,
                    sextanerblase character varying(100) DEFAULT \'n/a\'::character varying,
                    auslandskorrespondent character varying(100) DEFAULT \'n/a\'::character varying,
                    dam character varying(100) DEFAULT \'n/a\'::character varying,
                    daw character varying(100) DEFAULT \'n/a\'::character varying,
                    seeles character varying(100) DEFAULT \'n/a\'::character varying,
                    hobbypsychologe character varying(100) DEFAULT \'n/a\'::character varying,
                    sanitäter character varying(100) DEFAULT \'n/a\'::character varying,
                    schauspieler character varying(100) DEFAULT \'n/a\'::character varying,
                    handysuchti character varying(100) DEFAULT \'n/a\'::character varying,
                    vielfraß character varying(100) DEFAULT \'n/a\'::character varying,
                    ehepaar character varying(100) DEFAULT \'n/a\'::character varying,
                    weltenbummler character varying(100) DEFAULT \'n/a\'::character varying,
                    starfotograf character varying(100) DEFAULT \'n/a\'::character varying,
                    stock character varying(100) DEFAULT \'n/a\'::character varying,
                    wutbürger character varying(100) DEFAULT \'n/a\'::character varying,
                    backmeister character varying(100) DEFAULT \'n/a\'::character varying,
                    ordnungsamt character varying(100) DEFAULT \'n/a\'::character varying,
                    chemiker character varying(100) DEFAULT \'n/a\'::character varying,
                    diskussion character varying(100) DEFAULT \'n/a\'::character varying,
                    quasselstrippe character varying(100) DEFAULT \'n/a\'::character varying,
                    hausaufgabe character varying(100) DEFAULT \'n/a\'::character varying,
                    öko character varying(100) DEFAULT \'n/a\'::character varying,
                    revoluzzer character varying(100) DEFAULT \'n/a\'::character varying,
                    sauklaue character varying(100) DEFAULT \'n/a\'::character varying,
                    girl character varying(100) DEFAULT \'n/a\'::character varying,
                    vorgelernt character varying(100) DEFAULT \'n/a\'::character varying,
                    entscheidungsunfähig character varying(100) DEFAULT \'n/a\'::character varying,
                    prinzessin character varying(100) DEFAULT \'n/a\'::character varying,
                    sprachtalent character varying(100) DEFAULT \'n/a\'::character varying,
                    gemein character varying(100) DEFAULT \'n/a\'::character varying,
                    genie character varying(100) DEFAULT \'n/a\'::character varying,
                    punktefeilscher character varying(100) DEFAULT \'n/a\'::character varying,
                    anti character varying(100) DEFAULT \'n/a\'::character varying,
                    männerschwarm character varying(100) DEFAULT \'n/a\'::character varying,
                    frauenheld character varying(100) DEFAULT \'n/a\'::character varying,
                    festivalgänger character varying(100) DEFAULT \'n/a\'::character varying,
                    altphilologe character varying(100) DEFAULT \'n/a\'::character varying,
                    rock character varying(100) DEFAULT \'n/a\'::character varying,
                    klausurnachbar character varying(100) DEFAULT \'n/a\'::character varying,
                    naturbursche character varying(100) DEFAULT \'n/a\'::character varying,
                    riese character varying(100) DEFAULT \'n/a\'::character varying,
                    drecksack character varying(100) DEFAULT \'n/a\'::character varying,
                    organisationsdesaster character varying(100) DEFAULT \'n/a\'::character varying,
                    junggeselle character varying(100) DEFAULT \'n/a\'::character varying,
                    schlaftablette character varying(100) DEFAULT \'n/a\'::character varying,
                    feministin character varying(100) DEFAULT \'n/a\'::character varying,
                    notenwürfler character varying(100) DEFAULT \'n/a\'::character varying,
                    punktelieferant character varying(100) DEFAULT \'n/a\'::character varying,
                    ähm character varying(100) DEFAULT \'n/a\'::character varying,
                    pause character varying(100) DEFAULT \'n/a\'::character varying,
                    seelel character varying(100) DEFAULT \'n/a\'::character varying,
                    unterricht character varying(100) DEFAULT \'n/a\'::character varying,
                    eingebildet character varying(100) DEFAULT \'n/a\'::character varying,
                    spät character varying(100) DEFAULT \'n/a\'::character varying,
                    unbekannt character varying(100) DEFAULT \'n/a\'::character varying,
                    schülerliebling character varying(100) DEFAULT \'n/a\'::character varying,
                    miesepeter character varying(100) DEFAULT \'n/a\'::character varying,
                    moralapostel character varying(100) DEFAULT \'n/a\'::character varying,
                    verplant character varying(100) DEFAULT \'n/a\'::character varying,
                    dressed character varying(100) DEFAULT \'n/a\'::character varying,
                    kopierkönig character varying(100) DEFAULT \'n/a\'::character varying,
                    grinsekatze character varying(100) DEFAULT \'n/a\'::character varying,
                    tafelbild character varying(100) DEFAULT \'n/a\'::character varying,
                    gartenzwerg character varying(100) DEFAULT \'n/a\'::character varying,
                    übermotiviert character varying(100) DEFAULT \'n/a\'::character varying,
                    sprücheklopfer character varying(100) DEFAULT \'n/a\'::character varying,
                    ip character varying(64) NOT NULL';
                $sqlIntegration = 'INSERT INTO surveys (name, open) VALUES (\'a_level_ball_speech\', false);';
                break;
            case 'a_level_ball_speech':
                $columnConfig = '
                    id serial PRIMARY KEY NOT NULL,
                    chosenspeaker character varying(100) NOT NULL,
                    ip character varying(64) NOT NULL';
                $sqlIntegration = 'INSERT INTO surveys (name, open) VALUES (\'a_level_ball_speech\', false);';
                break;
            case 'a_level_mottoweek':
                $columnConfig = '
                    id serial PRIMARY KEY,
                    ip character varying(64) NOT NULL,
                    monster boolean DEFAULT false,
                    geschlechtertausch boolean DEFAULT false,
                    ersterschultag boolean DEFAULT false,
                    hippie boolean DEFAULT false,
                    pyjama boolean DEFAULT false,
                    bunt boolean DEFAULT false,
                    vip boolean DEFAULT false,
                    traumberuf boolean DEFAULT false,
                    assi boolean DEFAULT false,
                    diegroßen boolean DEFAULT false,
                    streber boolean DEFAULT false,
                    anything boolean DEFAULT false,
                    derabend boolean DEFAULT false,
                    mittelalter boolean DEFAULT false,
                    lieblingsmannschaft boolean DEFAULT false,
                    chemieunfall boolean DEFAULT false,
                    lieblingstier boolean DEFAULT false,
                    kindheitshelden boolean DEFAULT false,
                    eskalation boolean DEFAULT false,
                    gaypride boolean DEFAULT false';
                $sqlIntegration = 'INSERT INTO surveys (name, open) VALUES (\'a_level_ball_speech\', false);';
                break;
            case 'dj_song_suggestions':
                $columnConfig = '
                    id serial PRIMARY KEY,
                    title character varying(100) DEFAULT \'n/a\'::character varying,
                    artist character varying(100) DEFAULT \'n/a\'::character varying,
                    album character varying(100) DEFAULT \'n/a\'::character varying,
                    comment character varying(250) DEFAULT \'n/a\'::character varying,
                    ip character varying(64) NOT NULL,
                    datetime timestamp without time zone NOT NULL,
                    approved boolean DEFAULT false';
                $sqlIntegration = 'INSERT INTO surveys (name, open) VALUES (\'dj_song_suggestions\', false);';
                break;
            case 'monty_hall_problem':
                $columnConfig = '
                    id serial PRIMARY KEY NOT NULL,
                    player character NOT NULL,
                    moderator character NOT NULL,
                    car character NOT NULL,
                    change boolean NOT NULL';
                $sqlIntegration = 'INSERT INTO surveys (name, open) VALUES (\'monty_hall_problem\', false);';
                break;
            case 'private_data':
                $columnConfig = '
                    key text PRIMARY KEY NOT NULL,
                    value text NOT NULL';
                break;
            case 'surveys':
                $columnConfig = '
                    id serial PRIMARY KEY NOT NULL,
                    name character varying(75) NOT NULL,
                    open boolean DEFAULT false';
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

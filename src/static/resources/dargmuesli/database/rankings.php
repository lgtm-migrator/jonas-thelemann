<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';

    $dbhName = $_POST['dbhName'];

    if (empty($dbhName)) {
        $dbhName = null;
    }

    // Check if required parameters are given
    if ($dbhName != null) {

        // Get right PDO instance
        $dbh = getDbh($dbhName);

        // Continue only if PDO instance was found
        if ($dbh != null) {
            $rankingType = $_POST['rankingType'];

            if (empty($rankingType)) {
                $rankingType = null;
            }

            $sql = null;

            switch ($rankingType) {
                case 'list':
                    $tableName = $_POST['tableName'];

                    if (empty($tableName)) {
                        $tableName = null;
                    }

                    $columnName = $_POST['columnName'];

                    if (empty($columnName)) {
                        $columnName = null;
                    }

                    $limit = $_POST['limit'];

                    if (empty($limit)) {
                        $limit = null;
                    }

                    if ($tableName != null && $columnName != null && $limit != null) {
                        $sql = 'SELECT '.pg_escape_string($columnName).', count(*) AS "quantity" FROM '.pg_escape_string($tableName).' GROUP BY '.pg_escape_string($columnName).' ORDER BY "quantity" DESC LIMIT '.pg_escape_string($limit);
                    }

                    break;
                case 'matrix':
                    $tableName = $_POST['tableName'];

                    if (empty($tableName)) {
                        $tableName = null;
                    }

                    $categories = json_decode($_POST['categories'], true);

                    if (empty($categories)) {
                        $categories = null;
                    }

                    // Continue only if categories are set
                    if ($tableName != null && $categories != null) {
                        $sql = '';

                        for ($i = 0; $i < count($categories); ++$i) {
                            $categoryKey = array_keys($categories[$i])[0];
                            $categoryName = $categories[$i][$categoryKey];

                            // Append UNION before every other SELECT
                            if ($i > 0) {
                                $sql .= ' UNION ';
                            }

                            $sql .= 'SELECT '.pg_escape_string($categoryName).' AS "name", (SELECT count(*) FROM '.pg_escape_string($tableName).' WHERE "'.pg_escape_string($categoryKey).'" = true) AS "quantity"';
                        }

                        $sql .= ' ORDER BY "quantity" DESC';
                    }

                    break;
            }

            $stmt = $dbh->prepare($sql);

            if (!$stmt->execute()) {
                throw new PDOException($stmt->errorInfo()[2]);
            }

            $rankings = $stmt->fetchAll(PDO::FETCH_BOTH);

            echo getRankingsHtml($rankings);
        }
    }

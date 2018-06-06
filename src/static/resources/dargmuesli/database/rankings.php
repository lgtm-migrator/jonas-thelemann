<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/whitelist.php';
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
            $tableName = $_POST['tableName'];

            if (empty($tableName)) {
                $tableName = null;
            }

            if (!in_array($tableName, array_keys($tableWhitelist))) {
                throw new Exception('"'.$tableName.'" is not whitelisted!');
            }

            $rankingType = $_POST['rankingType'];

            if (empty($rankingType)) {
                $rankingType = null;
            }

            $sql = null;

            switch ($rankingType) {
                case 'list':
                    $columnName = $_POST['columnName'];

                    if (empty($columnName)) {
                        $columnName = null;
                    }

                    if (!in_array($columnName, $tableWhitelist[$tableName])) {
                        throw new Exception('"'.$columnName.'" is not whitelisted!');
                    }

                    $limit = $_POST['limit'];

                    if (empty($limit)) {
                        $limit = null;
                    }

                    if ($tableName != null && $columnName != null && $limit != null) {
                        $sql = 'SELECT '.$columnName.', count(*) AS "quantity" FROM '.$tableName.' GROUP BY '.$columnName.' ORDER BY "quantity" DESC LIMIT '.filter_var($limit, FILTER_SANITIZE_NUMBER_INT);
                    }

                    break;
                case 'matrix':
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

                            if (!in_array($categoryKey, $tableWhitelist[$tableName])) {
                                throw new Exception('"'.$categoryKey.'" is not whitelisted!');
                            }

                            $sql .= 'SELECT '.$dbh->quote($categoryName).' AS "name", (SELECT count(*) FROM '.$tableName.' WHERE '.$categoryKey.' = true) AS "quantity"';
                        }

                        $sql .= ' ORDER BY "quantity" DESC';
                    }

                    break;
                default:
                    throw new Exception('"'.$rankingType.'" is a valid ranking type!');
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

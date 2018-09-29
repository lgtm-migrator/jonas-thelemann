<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    $tableName = 'monty_hall_problem';

    // Load .env file
    load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

    // Get database handle
    $dbh = get_dbh($_ENV['PGSQL_DATABASE']);

    if (isset($_GET['type'])) {
        switch ($_GET['type']) {
            case 'playercounts':
                $dataResultCount = null;
                $stmt = $dbh->prepare('SELECT COUNT(*) FROM '.$tableName.' WHERE player = :player');
                $stmt->bindParam(':player', $player);

                foreach ([1, 2, 3] as $player) {
                    if (!$stmt->execute()) {
                        throw new PDOException($stmt->errorInfo()[2]);
                    }

                    $dataResultCount[$player - 1] = $stmt->fetchColumn();
                }

                echo json_encode($dataResultCount);
                break;
            case 'colordata':
                $winCountRed = null;
                $countRed = null;
                $dataRed = array();
                $winCountBlue = null;
                $countBlue = null;
                $dataBlue = array();

                $counter = 0;

                foreach ($dbh->query('SELECT * FROM '.$tableName) as $dbLine) {
                    ++$counter;

                    if ($dbLine['change'] == true) {
                        if (($dbLine['player'] == 1 && $dbLine['car'] == 1)
                            || ($dbLine['player'] == 2 && $dbLine['car'] == 2)
                            || ($dbLine['player'] == 3 && $dbLine['car'] == 3)) {
                            //Gewonnen
                            ++$winCountRed;
                        } else {
                            //Verloren
                        }

                        ++$countRed;

                        array_push($dataRed, ['x' => $counter, 'y' => round($winCountRed / $countRed * 100) / 100]);
                    } else {
                        if (($dbLine['player'] == 1 && $dbLine['car'] == 1)
                            || ($dbLine['player'] == 2 && $dbLine['car'] == 2)
                            || ($dbLine['player'] == 3 && $dbLine['car'] == 3)) {
                            //Gewonnen
                            ++$winCountBlue;
                        } else {
                            //Verloren
                        }

                        ++$countBlue;

                        array_push($dataBlue, ['x' => $counter, 'y' => round($winCountBlue / $countBlue * 100) / 100]);
                    }
                }

                echo json_encode(array("rows" => $counter, "dataRed" => $dataRed, "dataBlue" => $dataBlue));
                break;
        }
    }

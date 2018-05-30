<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['SERVER_ROOT'].'/credentials/database.php';

    // var playerOneElementsLength = <?php echo $dataResultCountPlayerOne;
    // var playerTwoElementsLength = <?php echo $dataResultCountPlayerTwo;
    // var playerThreeElementsLength = <?php echo $dataResultCountPlayerThree;
    // var rows = <?php echo $dataResultCountPlayerOne + $dataResultCountPlayerTwo + $dataResultCountPlayerThree;
    // var winCountRed = <?php echo $winCountRed;
    // var winCountBlue = <?php echo $winCountBlue;
    // var countRed = <?php echo $countRed;
    // var countBlue = <?php echo $countBlue;
    // var dataRed = <?php echo json_encode($dataRed);
    // var dataBlue = <?php echo json_encode($dataBlue);

    $page = 1;
    $tableName = 'monty-hall-problem';
    $dbh = getDbh($_ENV['PGSQL_DATABASE']);

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = intval($_GET['page']);
    }

    $dataResult = $dbh->query('SELECT COUNT(*) FROM "'.$tableName.'" WHERE player=1');
    $dataResultCountPlayerOne = $dataResult->fetchColumn();
    $dataResult = $dbh->query('SELECT COUNT(*) FROM "'.$tableName.'" WHERE player=2');
    $dataResultCountPlayerTwo = $dataResult->fetchColumn();
    $dataResult = $dbh->query('SELECT COUNT(*) FROM "'.$tableName.'" WHERE player=3');
    $dataResultCountPlayerThree = $dataResult->fetchColumn();

    $winCountRed = null;
    $countRed = null;
    $dataRed = array();
    $winCountBlue = null;
    $countBlue = null;
    $dataBlue = array();

    $counter = 0;

    foreach ($dbh->query('SELECT * FROM "'.$tableName.'"') as $dbLine) {
        ++$counter;

        if ($dbLine['change'] == true) {
            if ($dbLine['player'] == 1 && $dbLine['car'] == 1) {
                //Verloren
            } elseif ($dbLine['player'] == 2 && $dbLine['car'] == 2) {
                //Verloren
            } elseif ($dbLine['player'] == 3 && $dbLine['car'] == 3) {
                //Verloren
            } else {
                //Gewonnen
                ++$winCountRed;
            }

            ++$countRed;

            array_push($dataRed, ['x' => $counter, 'y' => round(100 / $countRed * $winCountRed) / 100]);
        } else {
            if ($dbLine['player'] == 1 && $dbLine['car'] == 1) {
                //Gewonnen
                ++$winCountBlue;
            } elseif ($dbLine['player'] == 2 && $dbLine['car'] == 2) {
                //Gewonnen
                ++$winCountBlue;
            } elseif ($dbLine['player'] == 3 && $dbLine['car'] == 3) {
                //Gewonnen
                ++$winCountBlue;
            } else {
                //Verloren
            }

            ++$countBlue;

            array_push($dataBlue, ['x' => $counter, 'y' => round(100 / $countBlue * $winCountBlue) / 100]);
        }
    }

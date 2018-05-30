<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['SERVER_ROOT'].'/credentials/database.php';

    if (isset($_POST['chosenDoor']) && isset($_POST['modDoor']) && isset($_POST['carDoor']) && isset($_POST['change'])) {
        $chosenDoor = filter_var($_POST['chosenDoor'], FILTER_SANITIZE_NUMBER_INT);
        $modDoor = filter_var($_POST['modDoor'], FILTER_SANITIZE_NUMBER_INT);
        $carDoor = filter_var($_POST['carDoor'], FILTER_SANITIZE_NUMBER_INT);
        $change = filter_var(boolval($_POST['change']), FILTER_SANITIZE_STRING);

        if (filter_var($chosenDoor, FILTER_VALIDATE_INT) && filter_var($modDoor, FILTER_VALIDATE_INT) && filter_var($carDoor, FILTER_VALIDATE_INT) && filter_var($change, FILTER_VALIDATE_BOOLEAN)) {
            $dbh = getDbh($_ENV['PGSQL_DATABASE']);

            // Insert the form values into the database
            $dbh->exec("INSERT INTO \"monty-hall-problem\" (player, moderator, car, change) VALUES ('".$chosenDoor."', '".$modDoor."', '".$carDoor."', '".$change."')");

            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }

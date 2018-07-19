<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/whitelist.php';

    function no_more_than_n_in_i($dbh, $n, $interval, $table, $column)
    {
        global $tableWhitelist;

        if (!in_array($table, array_keys($tableWhitelist))) {
            throw new PDOException('"'.$table.'" is not whitelisted!');
        }

        if (!in_array($column, $tableWhitelist[$table])) {
            throw new PDOException('"'.$column.'" is not whitelisted!');
        }

        $interval = $interval;

        $stmt = $dbh->prepare('SELECT * FROM '.$table.' WHERE '.$column.' > NOW() - :interval::INTERVAL');
        $stmt->bindParam(':interval', $interval);

        if (!$stmt->execute()) {
            throw new PDOException($stmt->errorInfo()[2]);
        }

        if ($stmt->rowCount() < $n) {
            return true;
        } else {
            return false;
        }
    }

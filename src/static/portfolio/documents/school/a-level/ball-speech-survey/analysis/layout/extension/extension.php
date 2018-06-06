<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    // echo json_encode(getAnonymizedNames(array_keys($candidates)));
    // echo json_encode(getAnonymizedNames(array_values($candidates)));

    $candidates = ['candidateelisabeth' => 0, 'candidatejonas' => 0, 'candidaterosa' => 0, 'nobody' => 0];
    $candidateNames = ['Elisabeth Schwab', 'Jonas Thelemann', 'Rosa Freytag', 'Niemand'];

    $dbh = getDbh($_ENV['PGSQL_DATABASE']);

    function getAnonymizedNames($names)
    {
        $anonymizedNames = preg_replace('/(\\B\\p{L})/Uu', '*', $names);

        return $anonymizedNames;
    }

    foreach ($candidates as $key => $value) {
        $stmt = $dbh->prepare("SELECT count(*) FROM \"alevel-ball-speech\" WHERE chosenspeaker='".$key."'");

        if (!$stmt->execute()) {
            throw new PDOException($stmt->errorInfo()[2]);
        }

        $candidates[$key] = intval($stmt->fetch(PDO::FETCH_ASSOC)['count']);
    }

    $candidates = newKeys($candidates, $candidateNames);
    arsort($candidates);

    function newKeys($array, $newkeys)
    {
        if (count($array) !== count($newkeys)) {
            return false;
        }

        $newarray = array();
        $i = 0;

        foreach ($array as $key => $value) {
            $newarray[$newkeys[$i]] = $value;
            ++$i;
        }

        return $newarray;
    }

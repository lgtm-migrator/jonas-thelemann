<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

    // echo json_encode(get_anonymized_names(array_keys($candidates)));
    // echo json_encode(get_anonymized_names(array_values($candidates)));

    $candidates = ['candidateelisabeth' => 0, 'candidatejonas' => 0, 'candidaterosa' => 0, 'nobody' => 0];
    $candidateNames = ['Elisabeth Schwab', 'Jonas Thelemann', 'Rosa Freytag', 'Niemand'];

    $dbh = get_dbh($_ENV['PGSQL_DATABASE']);

    function get_anonymized_names($names)
    {
        $anonymizedNames = preg_replace('/(\\B\\p{L})/Uu', '*', $names);

        return $anonymizedNames;
    }

    foreach ($candidates as $key => $value) {
        $stmt = $dbh->prepare('SELECT count(*) FROM alevel_ball_speech WHERE chosenspeaker = :chosenspeaker');
        $stmt->bindParam(':chosenspeaker', $key);

        if (!$stmt->execute()) {
            throw new PDOException($stmt->errorInfo()[2]);
        }

        $candidates[$key] = intval($stmt->fetch(PDO::FETCH_ASSOC)['count']);
    }

    $candidates = new_keys($candidates, $candidateNames);
    arsort($candidates);

    function new_keys($array, $newkeys)
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

<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    $open = false;
    $dbh = getDbh($_ENV['PGSQL_DATABASE']);
    $stmt = $dbh->prepare('SELECT ip FROM mottos WHERE ip = :ip');
    $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

    if (!$stmt->execute()) {
        throw new PDOException($stmt->errorInfo()[2]);
    }

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $monster = $geschlechtertausch = $ersterschultag = $hippie = $pyjama = $bunt = $vip = $traumberuf = $assi = $diegroßen = $streber = $anything = $derabend = $mittelalter = $lieblingsmannschaft = $chemieunfall = $lieblingstier = $kindheitshelden = $eskalation = $gaypride = 'false';

    if ($open && !empty($_POST['check_list'])) {
        foreach ($_POST['check_list'] as $check) {
            ${$check} = 'true';
        }
    }

    die(header('location:../../index.php'));

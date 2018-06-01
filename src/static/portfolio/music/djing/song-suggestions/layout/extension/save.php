<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    $open = false;
	$dbh = getDbh($_ENV['PGSQL_DATABASE']);

    if ($open) {
        $dbh->exec("INSERT INTO \"dj-song-suggestions\" (title, artist, album, comment, ip, datetime) VALUES ('".$_POST['title']."', '".$_POST['artist']."', '".$_POST['albumgroup']."', '".$_POST['comment']."', '".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d H:i:s', strtotime('now'))."')");
    }

    die(header('location:../../index.php?result=success'));

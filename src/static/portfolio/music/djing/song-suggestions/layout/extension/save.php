<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/surveys.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/survey/results.php';

    $result = 'unknown';

    if (!$_POST['album-group']
        || !($_POST['title'] || $_POST['artist'])
        || strlen($_POST['title']) > 200) {
        $result = 'invalid';
    }

    // Load .env file
    loadEnvFile($_SERVER['SERVER_ROOT'].'/credentials');

    // Get database handle
    $dbh = getDbh($_ENV['PGSQL_DATABASE']);

    // Initialize the required tables
    foreach (array('surveys', 'dj_song_suggestions') as $tableName) {
        if (!initTable($dbh, $tableName)) {
            throw new Exception('Could not initialize table "'.$tableName.'"!');
        }
    }

    if (isSurveyOpen($dbh, 'dj_song_suggestions')) {
        $stmt = $dbh->prepare('INSERT INTO dj_song_suggestions (title, artist, album, comment, ip, datetime) VALUES (:title, :artist, :album, :comment, :ip, :datetime)');

        $datetime = date('Y-m-d H:i:s', strtotime('now'));

        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':artist', $_POST['artist']);
        $stmt->bindParam(':album', $_POST['album-group']);
        $stmt->bindParam(':comment', $_POST['comment']);
        $stmt->bindParam(':ip', $_SERVER['REMOTE_ADDR']);
        $stmt->bindParam(':datetime', $datetime);

        if ($stmt->execute()) {
            $result = 'success';
        } else {
            $result = 'failure';
        }
    } else {
        $result = 'closed';
    }

    echo getSurveyResultForm($result);

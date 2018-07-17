<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    // include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/ratelimiting.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/surveys.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/survey/results.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/strings.php';

    array_filter($_POST, 'trimValue');

    if (!isset($_POST['album-group'])
        || !(isset($_POST['title']) || isset($_POST['artist']))
        || strlen($_POST['title']) > 200) {

        // Bad request
        return http_response_code(400);
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

    if (!isSurveyOpen($dbh, 'dj_song_suggestions')) {

        // Forbidden
        return http_response_code(403);
    }

    // if (!noMoreThanNInI($dbh, 100, '1 hour', 'dj_song_suggestions', 'datetime')) {

    //     // Rate limiting
    //     return http_response_code(429);
    // }

    $stmt = $dbh->prepare('INSERT INTO dj_song_suggestions (title, artist, album, comment, ip, datetime) VALUES (:title, :artist, :album, :comment, :ip, :datetime)');

    $datetime = date('Y-m-d H:i:s', strtotime('now'));

    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':artist', $_POST['artist']);
    $stmt->bindParam(':album', $_POST['album-group']);
    $stmt->bindParam(':comment', $_POST['comment']);
    $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);
    $stmt->bindParam(':datetime', $datetime);

    if (!$stmt->execute()) {

        // Internal server error
        return http_response_code(500);
    }

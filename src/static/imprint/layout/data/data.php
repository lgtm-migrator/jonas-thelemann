<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    // Load .env file
    load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

    $dataSiteKey;

    if (strrchr($_SERVER['SERVER_NAME'], '.') != '.test') {
        $dataSiteKey = $_ENV['RECAPTCHA_SITEKEY'];
    } else {
        $dataSiteKey = $_ENV['RECAPTCHA_SITEKEY_DEV'];
    }

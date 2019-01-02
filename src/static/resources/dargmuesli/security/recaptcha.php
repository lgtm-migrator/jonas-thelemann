<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';

    load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

    use ReCaptcha\ReCaptcha;

    $secret;

    if (strrchr($_SERVER['SERVER_NAME'], '.') != '.test') {
        $secret = $_ENV['RECAPTCHA_SECRET'];
    } else {
        $secret = $_ENV['RECAPTCHA_SECRET_DEV'];
    }

    function verify_recaptcha($response)
    {
        global $secret;

        $reCaptcha = new ReCaptcha($secret);
        $verification = $reCaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['HTTP_X_REAL_IP']);

        if ($verification->isSuccess()) {
            return true;
        } else {
            return false;
        }
    }

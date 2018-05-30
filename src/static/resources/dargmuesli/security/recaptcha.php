<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';
    include_once $_SERVER['SERVER_ROOT'].'/credentials/recaptcha.php';

    use ReCaptcha\ReCaptcha;

    function verifyReCaptcha($response)
    {
        global $secret;

        $reCaptcha = new ReCaptcha($secret);
        $verification = $reCaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        if ($verification->isSuccess()) {
            return true;
        } else {
            return false;
        }
    }

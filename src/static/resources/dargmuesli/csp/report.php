<?php
    error_log('called');

    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';

    load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

    http_response_code(204);

    $data = file_get_contents('php://input');

    if ($data = json_decode($data)) {
        $data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.strato.de';
        $mail->SMTPAuth = true;
        $mail->Username = $emailAddress;
        $mail->Password = $emailPassword;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->isHTML(false);
        $mail->From = $emailAddress;
        $mail->FromName = 'Jonas Thelemann';
        $mail->addAddress($emailAddress);
        $mail->Subject = 'CSP violation';
        $mail->Body = $data;
        $mail->send();
    }

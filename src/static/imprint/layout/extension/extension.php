<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/security/recaptcha.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';

    // Load .env file
    load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

    if (!empty($_POST)) {
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            if (verify_recaptcha($_POST['g-recaptcha-response'])) {
                echo get_indented_ml('
                    <address>
                        <p>
                            <span itemprop="name">Jonas Thelemann</span>
                            <br>
                            <span itemprop="postalCode">'.$_ENV['IMPRINT_POSTAL_CODE'].'</span> <span itemprop="addressLocality">'.$_ENV['IMPRINT_LOCALITY'].'</span>
                            <br>
                            <span itemprop="addressRegion">'.$_ENV['IMPRINT_REGION'].'</span>, <span itemprop="addressCountry">'.$_ENV['IMPRINT_COUNTRY'].'</span>
                        </p>
                        <p>
                            E-Mail: <a href="mailto:'.$_ENV['IMPRINT_MAILTO'].'" title="'.$_ENV['IMPRINT_MAILTO'].'">'.$_ENV['IMPRINT_MAILTO'].'</a>
                        </p>
                    </address>
                ');
            }
        }
    }

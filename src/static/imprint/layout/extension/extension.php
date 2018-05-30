<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/security/recaptcha.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';

    if (!empty($_POST)) {
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            if (verifyReCaptcha($_POST['g-recaptcha-response'])) {
                echo getIndentedML('
                    <address>
                        <p>
                            <span itemprop="name">Jonas Thelemann</span>
                            <br>
                            <span itemprop="postalCode">REDACTED</span> <span itemprop="addressLocality">REDACTED</span>
                            <br>
                            <span itemprop="addressRegion">REDACTED</span>, <span itemprop="addressCountry">REDACTED</span>
                        </p>
                        <p>
                            E-Mail: <a href="mailto:REDACTED" title="REDACTED">REDACTED</a>
                        </p>
                    </address>
                ');
            }
        }
    }

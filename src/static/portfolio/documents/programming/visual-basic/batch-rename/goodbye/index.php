<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Infomationen über das Projekt \'Batch Rename\' von Jonas Thelemann';
    $skeletonContent = '
    <p>
        Schade, dass du mich verlässt...vielleicht sehen wir uns ja bald wieder?
    </p>
    <p>
        Wenn du mir eine Rückmeldung geben möchtest, was dir gefällt oder nicht gefällt, kannst du dies gerne tun: batchrename.support@t-online.de
    </p>
    <p>
        Bis bald,
        <br>
        dein BatchRename-Team!
    </p>';

    output_html($skeletonDescription, $skeletonContent);

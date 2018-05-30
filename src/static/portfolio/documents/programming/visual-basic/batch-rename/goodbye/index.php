<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

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

    outputHtml($skeletonDescription, $skeletonContent);

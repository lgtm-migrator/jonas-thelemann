<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Infomationen über das Projekt \'Batch Rename\' von Jonas Thelemann';
    $skeletonContent = '
    <p>
        Jetzt kannst du direkt anfangen deinen Rechner aufzuräumen. Viel Spaß dabei!
    </p>
    <p>
        Was die Zukunft wohl bringen wird? :D
        <br>
        Dein JTP!
    </p>';

    outputHtml($skeletonDescription, $skeletonContent);

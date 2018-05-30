<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Schulprojekt für das Fach Religion über diesoziale Stellung der Frau in der Geschichte';
    $skeletonContent = '
    <iframe id="konsole" src="index.html"></iframe>';

    outputHtml($skeletonDescription, $skeletonContent);

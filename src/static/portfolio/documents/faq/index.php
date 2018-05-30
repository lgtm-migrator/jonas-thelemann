<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once 'layout/extension/extension.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Antworten auf die mir am häufigsten gestellten Fragen';
    $skeletonContent = $faqHtml;

    outputHtml($skeletonDescription, $skeletonContent);

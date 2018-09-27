<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once 'layout/extension/extension.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Antworten auf die mir am häufigsten gestellten Fragen';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = $faqHtml;

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = (isset($_GET['errorName'])) ? $_GET['errorName'] : 'Error';
    $skeletonContent = (isset($_GET['errorDescription'])) ? $_GET['errorDescription'] : 'Something went wrong.';

    output_html($skeletonDescription, $skeletonContent);

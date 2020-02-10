<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = '1 toller Generator vong Technik her';
    $skeletonFeatures = ['lcl/ext/css'];
    $skeletonContent = '
    <p>
        <a class="waves-effect waves-light btn" href="https://1generator.'.$_SERVER['HTTP_HOST'].'" rel="noopener" target="blank" title="1generator">
            <i class="material-icons right">
                open_in_new
            </i>
            Vollbild
        </a>
    </p>
    <iframe src="https://1generator.'.$_SERVER['HTTP_HOST'].'">
    </iframe>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

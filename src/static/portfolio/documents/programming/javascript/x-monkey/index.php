<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Meine Scripts für Grease- und Tapermonkey';
    $skeletonContent = '
    <section id="installation" class="section scrollspy">
        <h2>
            Installation
        </h2>
        <p>
            Die Scripts müssen über das Browser-Add-on <a href="https://addons.mozilla.org/de/firefox/addon/greasemonkey/" title="Mozilla Addons">Greasemonkey</a> (Firefox) oder <a href="https://chrome.google.com/webstore/detail/tampermonkey/dhdgffkkebhmkfjojejmpbldmpobfkfo" title="Chrome Webstore">Tapermonkey</a> (Chrome) installiert werden.
        </p>
    </section>';

    output_html($skeletonDescription, $skeletonContent);

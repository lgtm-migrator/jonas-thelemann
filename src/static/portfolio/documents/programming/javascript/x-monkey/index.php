<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Meine Scripts für Grease- und Tapermonkey';
    $skeletonContent = '
    <section id="installation" class="section scrollspy">
        <h2>
            Installation
        </h2>
        <p>
            Installiert werden müssen die Scripts über das Browser-Add-on <a href="https://addons.mozilla.org/de/firefox/addon/greasemonkey/" title="Mozilla Addons">Greasemonkey</a> (Firefox) oder <a href="https://chrome.google.com/webstore/detail/tampermonkey/dhdgffkkebhmkfjojejmpbldmpobfkfo" title="Chrome Webstore">Tapermonkey</a> (Chrome).
        </p>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent);

<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Geschichten und Erfahrungen über Dinge, die ich als DJ erlebe';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = '
    <section id="mixcloud" class="section scrollspy">
        <p>
            Der Inhalt dieser Seiten ist zukünftig auf <a href="https://creal.' . $_SERVER['HTTP_HOST'] . '/" rel="noopener" target="_blank" title="cReal">creal.' . $_SERVER['HTTP_HOST'] . '</a> zu finden.
        </p>
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

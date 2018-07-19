<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/disabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/navigation/sitemap.php';

    $skeletonDescription = 'Komplette Seitenstruktur dieser Website';
    $skeletonContent = '<section id="tableofcontents" class="section scrollspy">
                    <h2>
                        In&shy;halts&shy;ver&shy;zeich&shy;nis
                    </h2>
                    '.get_sitemap_html().'
                </section>';

    output_html($skeletonDescription, $skeletonContent);

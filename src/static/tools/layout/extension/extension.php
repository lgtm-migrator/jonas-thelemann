<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/io.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/navigation/sitemap.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';

    if (isset($_GET['sitemap'])) {
        write_file($_SERVER['DOCUMENT_ROOT'].'/sitemap/sitemap.xml', get_indented_ml(get_sitemap_xml()));
    }

<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';
    include_once dirname(__DIR__).'/data/data.php';

    global $faq;

    $faqHtml = get_faq_html($faq);

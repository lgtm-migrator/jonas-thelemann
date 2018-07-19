<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Software für die digitale Bildbearbeitung';
    $skeletonContent = '
    <section id="quickstart" class="section scrollspy">
        <h2>
            Schnelleinstieg
        </h2>
        <div class="row">
            <div class="col s12">
                Nach einigen Jahren Erfahrung mit Zoner habe ich eine kleine PDF-Datei angelegt, die die von mir am häufigsten benötigten Funktionen des Programms erläutern soll.
                Gleichzeitig soll dieses Dokument auch Neueinsteigern beim Zurechtfinden im Programm helfen.
                Es erklärt die Installation, Einrichtung und Benutzung der integrierten Werkzeuge, Effekte und Filter.
            </div>
        </div>
        <embed src="layout/data/schnellstart-zps-18.pdf" width="500" height="375" type="application/pdf">
    </section>';

    output_html($skeletonDescription, $skeletonContent);

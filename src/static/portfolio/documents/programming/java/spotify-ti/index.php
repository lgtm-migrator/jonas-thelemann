<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Infomationen über mein Java-Projekt \'SpotifyTI\'';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = '
    <div id="var" class="row">
        <p>
            Diese Seite ist momentan in ihrer nicht öffentlich sichtbaren Version Teil der Programmfunktion. Die Benutzer, die hier landen, finden das, was sie suchen.
            <br>
            Deshalb braucht aber niemand traurig sein. Bei genug Interesse werde ich das Programm auf GitHub laden und hier mehr Informationen dazu veröffentlichen.
        </p>
    </div>';

    outputHtml($skeletonDescription, $skeletonContent, $skeletonFeatures);

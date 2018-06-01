<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/names.php';
    include_once 'layout/extension/extension.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Eine Umfrage zur Abschlussrede auf dem Abiball 2016 des Friedrichsgymnasiums in Kassel';
    $skeletonFeatures = ['lcl/ext/css', 'lcl/ext/js', 'pkg/drgl/mjs', 'pkg/drgl/mcss'];
    $skeletonContent = '
    <section id="survey" class="section scrollspy">
        <h2>
            Umfrage
        </h2>
        <p>
            Wer soll die Schülerrede auf dem Abiball halten?
            <br>
            Ziehe die Person deiner Wahl auf das obere graue Feld und bestätige deine Stimme mit einem Klick auf den jeweilig ausgewählten Kandidaten.
            <br>
            Um deine Stimme zurückzuziehen, ziehe die Person deiner vorherigen Wahl wieder aus dem grauen Feld heraus <em>und</em> klicke dann zur Bestätigung eine beliebige Person aus dem unteren Bereich an.
        </p>
        <div id="figures"></div>
        <div class="well">
            <form action="layout/ext/extension.js.php" id="form" method="post">
                <div id="speakerspot" class="dropzone dragula-container">
                </div>
                <div id="candidates">
                </div>
            </form>
        </div>
    </section>';

    $skeletonContent = getPopulatedCandidateSurvey($skeletonContent);

    outputHtml($skeletonDescription, $skeletonContent, $skeletonFeatures);

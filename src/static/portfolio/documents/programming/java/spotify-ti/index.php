<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Infomationen über mein Java-Projekt \'SpotifyTI\'';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = '
    <div id="var" class="row">
        <p>
            Dieses Projekt befindet sich in der Entwicklungsphase.
            Es wird dazu dienen, Informationen von der <a href="https://developer.spotify.com/documentation/web-api/" rel="noopener" title="Web-API" target="blank">Spotify Web-API</a> zu holen und diese lokalen Dateien zuzuordnen.
        </p>
    </div>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

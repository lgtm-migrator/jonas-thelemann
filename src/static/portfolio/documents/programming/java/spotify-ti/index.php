<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Infomationen über mein Java-Projekt \'SpotifyTI\'';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = '
    <div class="row">
        <p>
            Dieses Projekt befindet sich in der Entwicklungsphase.
            Es wird dazu dienen, Informationen von der <a href="https://developer.spotify.com/documentation/web-api/" rel="noopener" title="Web-API" target="blank">Spotify Web-API</a> zu holen und diese lokalen Dateien zuzuordnen.
        </p>
    </div>
    <div id="hidden" class="hidden">
        <h2>
            Dein Code
        </h2>
        <p>
            Kopiere ihn als nächstes und füge ihn in SpotifyTI ein.
        </p>
        <div class="card-panel"><span id="code"></span></div>
        <p>
            <a class="btn copy waves-effect waves-light" href="#!" id="copy">
                <i class="material-icons left">
                    content_copy
                </i>
                Kopieren
            </a>
        </p>
    </div>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

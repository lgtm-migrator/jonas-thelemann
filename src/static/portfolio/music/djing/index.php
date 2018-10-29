<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Geschichten und Erfahrungen über Dinge, die ich als DJ erlebe';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = '
    <section id="mixcloud" class="section scrollspy">
        <h2>
            Mixcloud
        </h2>
        <p>
            Hier eine Auswahl meiner zu <a href="https://www.mixcloud.com/" rel="noopener" target="_blank" title="Mixcloud">Mixcloud</a> hochgeladenen Sets.
        </p>
        <p>
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header">
                        Muesli Mixes
                    </div>
                    <div class="collapsible-body">
                        <iframe width="100%" height="60" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&mini=1&feed=%2Fcreal%2Fplaylists%2Fmuesli-mixes%2F" frameborder="0">
                        </iframe>
                        <div class="center-align">
                            <a class="waves-effect waves-light btn" href="https://www.mixcloud.com/creal/playlists/muesli-mixes/" rel="noopener" target="_blank" title="Muesli Mixes">
                                <i class="material-icons right">
                                    open_in_new
                                </i>
                                Zur Playlist
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        Trap Nation Monthly Mixes
                    </div>
                    <div class="collapsible-body">
                        <iframe width="100%" height="60" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&mini=1&feed=%2Fcreal%2Fplaylists%2Ftrap-nation-monthly-mixes%2F" frameborder="0">
                        </iframe>
                        <div class="center-align">
                            <a class="waves-effect waves-light btn" href="https://www.mixcloud.com/creal/playlists/trap-nation-monthly-mixes/" rel="noopener" target="_blank" title="Trap Nation Monthly Mixes">
                                <i class="material-icons right">
                                    open_in_new
                                </i>
                                Zur Playlist
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </p>
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

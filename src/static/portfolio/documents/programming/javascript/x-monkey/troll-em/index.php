<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Ein XMonkey-Tool, das das Web angenehm auffrischt';
    $skeletonContent = '
    <section id="description" class="section scrollspy">
        <h2>
            Beschreibung
        </h2>
        <p>
            Fügt ein Trollface oder einen Trolltext auf einigen (mehr oder weniger) großen Websites ein.
        </p>
        <p>
            Folgende Websites werden aktuell unterstützt: (Stand 08.09.2016)
            <ul class="collection">
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/apple/apple_troll.png" alt="" class="circle">
                    apple.com
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/bing/bing_troll.png" alt="" class="circle">
                    bing.com
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/dropbox/dropbox_troll.png" alt="" class="circle">
                    dropbox.com
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/duckduckgo/duckduckgo_troll.png" alt="" class="circle">
                    duckduckgo.com
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/ecosia/ecosia_troll.png" alt="" class="circle">
                    ecosia.org
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/google/google_troll.png" alt="" class="circle">
                    google.de
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/microsoft/microsoft_troll.png" alt="" class="circle">
                    microsoft.com
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/netflix/netflix_troll.png" alt="" class="circle">
                    netflix.com
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/spiegel/spiegel_troll.png" alt="" class="circle">
                    spiegel.de
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/wikipedia/wikipedia_troll.png" alt="" class="circle">
                    wikipedia.org
                </li>
                <li class="collection-item avatar">
                    <img src="https://raw.githubusercontent.com/Dargmuesli/troll-em/master/websites/youtube/youtube_troll.png" alt="" class="circle">
                    youtube.com
                </li>
            </ul>
            Folgende Websiten könnten noch unterstützt werden:
            <ul class="collection">
                <li class="collection-item">
                    chip.de
                </li>
                <li class="collection-item">
                    gutefrage.net
                </li>
                <li class="collection-item">
                    twitch.tv
                </li>
                <li class="collection-item">
                    twitter.com
                </li>
            </ul>
        </p>
    </section>
    <section id="installation" class="section scrollspy">
        <h2>
            Installation
        </h2>
        <p>
            Wenn <a href="../" title="XMonkey">das jeweilige XMonkey-Add-on</a> installiert ist, kann das Script einfach über einen <a href="https://github.com/Dargmuesli/Troll-em/raw/master/troll-em.user.js" rel="noopener" target="_blank" title="Github Raw">Klick auf diesen Link</a> installiert werden.
        </p>
    </section>
    <section id="references" class="section scrollspy">
        <h2>
            Referenzen
        </h2>
        <section>
            <h3>
                Greasy Fork
            </h3>
            <p>
                Der Ort, an dem das Script zu Hause ist: <a href="https://greasyfork.org/de/scripts/17608-troll-em" rel="noopener" target="_blank" title="GreasyFork">https://greasyfork.org/de/scripts/17608-troll-em</a>
            </p>
        </section>
        <section>
            <h3>
                GitHub
            </h3>
            <p>
                Das offizielle Repository: <a href="https://github.com/Dargmuesli/Troll-em" rel="noopener" target="_blank" title="Github Repository">https://github.com/Dargmuesli/Troll-em</a>
            </p>
        </section>
    </section>';

    output_html($skeletonDescription, $skeletonContent);

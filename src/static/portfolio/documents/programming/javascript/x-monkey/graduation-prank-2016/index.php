<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Ein XMonkey-Tool zur Erinnerung an meinen Schuljahrgang';
    $skeletonContent = '
    <section id="description" class="section scrollspy">
        <h2>
            Beschreibung
        </h2>
        <p>
            Ersetzt die Slideshow der Website des Medienzentrums Kassel und damit der Startseite der Schul-Browser durch einem GIF mit dem Text "Abistreich 2016" und einem bewegten Hintergrund.
        </p>
        <p>
            <img alt="Graduation Prank 2016" class="responsive-img" src="layout/images/prank.gif">
        </p>
    </section>
    <section id="installation" class="section scrollspy">
        <h2>
            Installation
        </h2>
        <p>
            Wenn <a href="../" title="XMonkey">das jeweilige XMonkey-Add-on</a> installiert ist, kann das Script einfach über einen <a href="https://github.com/Dargmuesli/Abistreich-2016/raw/master/abistreich-2016.user.js" target="_blank" title="Github Raw">Klick auf diesen Link</a> installiert werden.
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
                Der Ort, an dem das Script zu Hause ist: <a href="https://greasyfork.org/de/scripts/20485-abistreich-2016" target="_blank" title="GreasyFork">https://greasyfork.org/de/scripts/20485-abistreich-2016</a>
            </p>
        </section>
        <section>
            <h3>
                GitHub
            </h3>
            <p>
                Das offizielle Repository: <a href="https://github.com/Dargmuesli/Abistreich-2016" target="_blank" title="Github Repository">https://github.com/Dargmuesli/Abistreich-2016</a>
            </p>
        </section>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent);

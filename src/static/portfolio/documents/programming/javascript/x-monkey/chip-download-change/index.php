<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Ein XMonkey-Tool zur Optimierung von chip.de';
    $skeletonContent = '
    <section id="description" class="section scrollspy">
        <h2>
            Beschreibung
        </h2>
        <p>
            Vertauscht den nervigen Link zum Chip Installer mit dem normalen Link zum "manuellen" Download.
        </p>
        <p>
            <img alt="Installer" class="responsive-img" src="layout/images/installer.png">
        </p>
    </section>
    <section id="installation" class="section scrollspy">
        <h2>
            Installation
        </h2>
        <p>
            Wenn <a href="../" title="XMonkey">das jeweilige XMonkey-Add-on</a> installiert ist, kann das Script einfach über einen <a href="https://github.com/Dargmuesli/Chip-Download-Change/raw/master/chip-download-change.user.js" target="_blank" title="Github Raw">Klick auf diesen Link</a> installiert werden.
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
                Der Ort, an dem das Script zu Hause ist: <a href="https://greasyfork.org/de/scripts/4466-chip-download-wechsel" target="_blank" title="GreasyFork">https://greasyfork.org/de/scripts/4466-chip-download-wechsel</a>
            </p>
        </section>
        <section>
            <h3>
                GitHub
            </h3>
            <p>
                Das offizielle Repository: <a href="https://github.com/Dargmuesli/Chip-Download-Change" target="_blank" title="Github Repository">https://github.com/Dargmuesli/Chip-Download-Change</a>
            </p>
        </section>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent);

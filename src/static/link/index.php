<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    $skeletonDescription = 'Under construction';
    $skeletonContent = '
    <section id="shortlinks" class="section scrollspy">
        <h2>
            Das ist ja ein toller QR-Code!
        </h2>
        <p>
            Hey, wahrscheinlich bist du hier gelandet, weil du meinen QR-Code gescannt hast.
            Aktuell gibt es hier noch nichts zu sehen.
            Ich richte hier meinen Shortlink-Service ein und sobald der fertig ist findest du hier die Infos, die du suchst! :)
        </p>
    </section>';

    output_html($skeletonDescription, $skeletonContent);

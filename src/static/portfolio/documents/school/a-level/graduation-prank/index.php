<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Ein Greasemonkey-Tool zur Anpassung der Website des Medienzentrums Kassel';
    $skeletonContent = '
    <section id="description" class="section scrollspy">
        <h2>
            Be&shy;schrei&shy;bung
        </h2>
        <p>
            Da die <a href="http://www.medienzentrum-kassel.de/" rel="noopener" target="_blank" title="Medienzentrum Kassel">Website des Medienzentrums Kassel</a> als Startseite der Browser der Schulcomputer eingestellt ist, habe ich mir als kleinen Beitrag zum Abistreich überlegt, dass man die Diashow darauf durch ein GIF mit dem Text "Abistreich 2016" und einem bewegten Hintergrund ersetzen könnte.
            Das Design ist eine leicht veränderte Variante der <a href="/portfolio/graphic/digital/blender/prom/" title="Abiball">Abiball-Eintrittskatrte</a>, bei der der Hintergrund schnell zwischen positiv und negativ wechselt.
            Das Script habe ich im Nachhinein noch so konfiguriert, dass es ab dem Tag des Abistreichs bis zum Ende des Schuljahres entsprechende Aufgabe erledigt.
            Außerdem liegt aktuell ein Link auf dem GIF, der auf diese Website verweist.
            Man kann das Script einerseits "Offline", also manuell installieren oder von <a href="https://greasyfork.org/de/" rel="noopener" target="_blank" title="GreasyFork">Greasy Fork</a> laden lassen.
            Dann lässt sich das Script auch notfalls noch im Nachhinein updaten (bzw. ändern, was aber vielleicht gar nicht gewünscht ist).
        </p>
        <p>
            <a href="#" title="Abistreich">
                <img alt="Graduation Prank 2016" class="responsive-img" src="/portfolio/documents/programming/javascript/x-monkey/graduation-prank-2016/layout/images/prank.gif">
            </a>
        </p>
    </section>
    <section id="references" class="section scrollspy">
        <h2>
            Re&shy;fe&shy;ren&shy;zen
        </h2>
        <p>
            <ul class="collection">
                <li class="collection-item">
                    <a href="/portfolio/documents/programming/javascript/x-monkey/graduation-prank-2016/" title="XMonkey Scripts">
                        Webscript-Details
                    </a>
                </li>
            </ul>
        </p>
    </section>';

    output_html($skeletonDescription, $skeletonContent);

<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Auf der Website von Jonas Thelemann';
    $skeletonFeatures = ['lcl/ext/js']; //  => 'sha384-y7DEEmz8XUVLfZqIdQzoEKloivYc0666nZd2xfuAXg6FPvLoxoEl1cGb5Z06WFOz'
    $skeletonContent = '
        <div id="greeting">
        <div id="greeting-viewblock" class="fullscreen"></div>
        <div id="greeting-image" class="fullscreen invisible"></div>
        <div class="greeting-overlay"></div>
        <div class="fullscreen valign-wrapper">
            <div id="greeting-text" class="valign center-align">
                <h1 class="white-text greeting-title">
                    Jonas Thelemann
                </h1>
                <p class="white-text caption">
                    Willkommen auf meiner Website
                </p>
            </div>
        </div>
        <div class="fullscreen valign-wrapper">
            <div class="valign center-align">
                <a class="waves-effect waves-orange btn-large white black-text" id="greeting-button">start</a>
            </div>
        </div>
    </div>
    <section id="firststeps" class="section scrollspy">
        <h2>
            Erste Schritte
        </h2>
        <p>
            Mit dem Programmieren habe ich in den Sommerferien 2013 angefangen, bevor ich in der Schule das erste Mal Informatikunterricht hatte, weil ich so gerne wissen wollte wie man eigentlich ein Programm schreibt.
            Damals hatte ich vor ein Programm zu schreiben, welches Bilder von Kameras (meist "0001.jpg", "0002.jpg", ... genannt) nach einem bestimmten Format abhängig vom Aufnahmedatum umbenennt und in Ordner sortiert.
            <br>
            Ich habe das Programm in Visual Basic geschrieben, weil man mit Visual Studio sehr einfach die Oberfläche eines Programms aufbauen kann und ich mich mehr auf die Funktionalität konzentrieren konnte.
            Das Programm war auch recht fertig <i>[ich finde Programme sind nie fertig]</i> und wurde von mir einige Zeit nicht angefasst.
            Nach meinen neuen Erfahrungen aus dem Informatikunterricht und eigenen Projekten habe ich mich dazu entschlossen das Programm neu zu schreiben.
            Dieses mal übersichtlicher, ähnlich einer App gestaltet.
            Nach gründlicher Bug-Suche und ausführlichem Testen habe ich diese Version von <a href="https://github.com/Dargmuesli/batchrename" target="_blank" title="Github">BatchRename</a> nun auch veröffentlicht.
        </p>
    </section>
    <section id="school" class="section scrollspy">
        <h2>
            Schule
        </h2>
        <p>
            Im Informatikunterricht wurden uns im zweiten Jahr mit Java bzw. Greenfoot und später BlueJ die Grundlagen des Programmierens beigebracht.
            Davor sollten wir eine Website mit HTML entwerfen.
            Das Thema habe ich, auch nachdem es im Unterricht abgeschlossen war, selbst weitergeführt.
            Dabei ist meine Website <a href="https://jonas-thelemann.de" title="jonas-thelemann.de">jonas-thelemann.de</a> entstanden, die momentan hauptsächlich <strong>Fülltext und unfunktionale Seiten</strong> enthält, da ich mich zuerst um das Design und die Funktionalität gekümmert habe.
            <br>
            Das Grundgerüst für die Website steht also, es fehlt nur an Inhalt.
            Dazu bin ich für längere Zeit allerdings auch nicht gekommen, weil ich die Website <a target="_blank" href="https://randomwinpicker.de" title="randomwinpicker.de">randomwinpicker.de</a> für den YouTuber <a href="https://www.youtube.com/user/dragonflygames" target="_blank" title="Megaquest">Megaquest</a> programmiert habe.
            Über diese Website kann jeder Besucher Verlosungen ablaufen lassen, wobei die Website momentan nur auf <abbr title="Waffentarnungen">Skins</abbr> für das bekannte Spiel <a href="https://de.wikipedia.org/wiki/Counter-Strike:_Global_Offensive" target="_blank" title="Counter Strike Global Offensive">CS:GO</a> ausgelegt ist.
            Mit der Website bin ich sehr zufrieden und so konnte ich mich gut auf mein Abitur konzentrieren, das ich mittlerweile abgeschlossen habe.
        </p>
    </section>
    <section id="scripts" class="section scrollspy">
        <h2>
            Scripts
        </h2>
        <p>
            Mein erstes Projekt in Javascript war ein Greasemonkey-Script mit dem Namen <a href="https://greasyfork.org/de/scripts/4466-chip-download-change" target="_blank" title="ChipDownloadChange">ChipDownloadChange</a>, das auf chip.de bei Downloads den Link, der auf den werbeverseuchten Chip-Downloader verweist, mit dem normalen "manuellen" Downloadlink vertauscht.
            Meine größeren, zuletzt abgeschlossenen Script-Projekte sind unter anderem der <a href="portfolio/programming/javascript/youtubecalendar/" title="YouTube Adventskalender">YouTube Adventskalender</a>, der vom 1. bis zum 31. Dezember (2015) jeden Tag zwei virale Videos bereithält, diverse Umfragen und eine spielerische Umsetzung des <a href="portfolio/documents/school/maths/montyhallproblem/" title="Das Ziegenproblem">Ziegenproblems</a>, das ich als Schulprojekt vorgestellt habe.
        </p>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent, $skeletonFeatures);

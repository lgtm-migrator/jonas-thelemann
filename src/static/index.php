<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

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
    <section id="portfolio" class="section scrollspy">
        <h2>
            Portfolio
        </h2>
        <p>
            Ein kurzer Lebenslauf findet sich <a href="portfolio" title="Portfolio">hier</a>.
        </p>
    </section>
    <section id="projects" class="section scrollspy">
        <h2>
            Projekte
        </h2>
        <section id="databases" class="section scrollspy">
            <h3>
                Datenbanken
            </h3>
            <p>
                Neben den PostgreSQL-Datenbanken, die bei meinen Websites zum Einsatz kommen, habe ich während meines Bundesfreiwilligendienstes beim Landkreis Kassel zwei Datenbanken für das Asylmanagement entworfen.
                Die <a href="https://github.com/Dargmuesli/asyl-db" rel="noopener" target="_blank" title="AsylDB">AsylDB</a> dient zur individuellen Fähigkeitsförderung der Asylbewerber.
                Die <a href="https://github.com/Dargmuesli/ehra-db" rel="noopener" target="_blank" title="EhraDB">EhraDB</a> ist eine Datenbank zur Ehrenamtsverwaltung in der Organisationseinheit Flüchtlingshilfe des Landkreises Kassel.
            </p>
        </section>
        <section id="java" class="section scrollspy">
            <h3>
                Java
            </h3>
            <p>
                Im zweiten Jahr des Informatikunterrichts wurden uns mit Greenfoot und später BlueJ die Grundlagen des Programmierens beigebracht.
                Weil ich mich weiter mit Java beschäftigen wollte - und weil ich es immer schon einmal machen wollte - habe ich zwei kleine <a href="https://github.com/Dargmuesli?tab=repositories&q=spigot+server+plugin&type=source&language=java" rel="noopener" target="_blank" title="Repositories">Spigot Server Plugins</a> geschrieben.
                Kurz darauf erhielt ich Rückmeldung von einem Bekannten, der bei Spotify arbeitet: ich war endlich Maintainer vom <a href="https://github.com/thelinmichael/spotify-web-api-java" rel="noopener" target="_blank" title="thelinmichael/spotify-web-api-java">Spotify Web API Wrapper für Java</a>!
            </p>
        </section>
        <section id="javascript" class="section scrollspy">
            <h3>
                JavaScript
            </h3>
            <p>
                Mein erstes Projekt in JavaScript war ein Greasemonkey-Script mit dem Namen <a href="https://greasyfork.org/de/scripts/4466-chip-download-change" rel="noopener" target="_blank" title="ChipDownloadChange">ChipDownloadChange</a>, das auf chip.de bei Downloads den Link, der auf den werbeverseuchten Chip-Downloader verweist, mit dem normalen "manuellen" Downloadlink vertauscht.
                Weitere Erfahrungen mit JavaScript habe ich in Projekten, wie dem <a href="portfolio/programming/javascript/youtubecalendar/" title="YouTube Adventskalender">YouTube Adventskalender</a>, der vom 1. bis zum 31. Dezember (2015) jeden Tag zwei virale Videos bereithält, diversen Umfragen und bei der spielerischen Umsetzung des <a href="portfolio/documents/school/maths/montyhallproblem/" title="Das Ziegenproblem">Ziegenproblems</a> (ein Schulprojekt) gesammelt.
            </p>
        </section>
        <section id="powershell" class="section scrollspy">
            <h3>
                PowerShell
            </h3>
            <p>
                Im Rahmen der Containerisierung meiner Webanwendungen, anfangs noch unter Windows, benötigte ich eine Skriptsprache zur Automatisierung der Buildprozesse.
                Hier bat sich <a href="https://github.com/PowerShell/PowerShell" rel="noopener" target="_blank" title="PowerShell">PowerShell</a> an, da es nativ auf Windows und mit PowerShell 6 auch auf Linux und MacOS funktioniert.
                <br>
                Zuerst entstand mein Skript zum Managen von Dockerprojekten <a href="https://github.com/Dargmuesli/ps-docker-management" rel="noopener" target="_blank" title="PS-Docker-Management">PS-Docker-Management</a>.
                Als abzusehen war, dass viele Funktionen auch in anderen Projekten benötigt werden könnten, lagerte ich diese in die mittlerweile ziemlich umfangreiche PowerShell-Bibliothek <a href="https://github.com/Dargmuesli/PowerShell-Lib" rel="noopener" target="_blank" title="PowerShell-Lib">PowerShell-Lib</a> aus.
                <br>
                Im ersten Semester meines Informatikstudiums waren Hausaufgaben in einem Modul als .jar-Datei abzugeben, wofür ein das Tool <a href="https://github.com/Dargmuesli/plm-jar-builder" rel="noopener" target="_blank" title="PLM-Jar-Builder">PLM-Jar-Builder</a> schrieb.
                Hiermit kann über die Kommandozeile eine beliebige Hausaufgabe gepackt, sowie hoch- und heruntergeladen werden.
            </p>
        </section>
        <section id="python" class="section scrollspy">
            <h3>
                Python
            </h3>
            <p>
                Zu der Zeit, in der ich mich verstärkt mit Geflüchteten beschäftigt habe, kam mir die Idee, für sie einen News-Bot zu schreiben.
                So entstand Ende 2016 der WhatsApp-Bot Tom, der unter dem Projektnamen <a href="https://github.com/Dargmuesli/bottom-news" rel="noopener" target="_blank" title="BotTom News">BotTom News</a> entwickelt wurde.
                Er sendete täglich ein "Tagesschau in 100 Sekunden auf Arabisch"-Video in eine WhatsApp-Gruppe mit Flüchtlingen.
            </p>
        </section>
        <section id="websites" class="section scrollspy">
            <h3>
                Websites
            </h3>
            <section id="jonas-thelemann.de" class="section scrollspy">
                <h4>
                    jonas-thelemann.de
                </h4>
                <p>
                    Der Grundstein für diese Website wurde 2014 im Informatikunterricht an <a href="http://www.fg-kassel.de/" title="Friedrichsgymnasium Kassel">meiner alten Schule</a> gelegt.
                    Aufgabe war es, eine einfache Seite in HTML, CSS und vielleicht auch JavaScript zu entwerfen.
                    Nachdem das Thema im Unterricht abgeschlossen wurde, habe ich die Entwicklung weitergeführt und die Website unter <a href="https://jonas-thelemann.de" title="jonas-thelemann.de">jonas-thelemann.de</a> für jeden erreichbar gemacht.
                    Momentan enthält sie an vielen Stellen hauptsächlich <strong>Fülltext und unfunktionale Seiten</strong>, da es nach Fertigstellung von Design und genereller Funktionalität fast ein Jahr gedauert hat, diese Website als <a href="https://github.com/dargmuesli/jonas-thelemann.de" rel="noopener" target="_blank" title="Dargmuesli/jonas-thelemann.de">Projekt auf GitHub</a> zu veröffentlichen.
                    Das Grundgerüst für die Website und einige Inhalte stehen also nun.
                </p>
            </section>
            <section id="randomwinpicker" class="section scrollspy">
                <h4>
                    randomwinpicker
                </h4>
                <p>
                    Um die Website <a href="https://randomwinpicker.jonas-thelemann.de/" rel="noopener" target="_blank" title="randomwinpicker">randomwinpicker</a> für den YouTuber <a href="https://www.youtube.com/user/dragonflygames" rel="noopener" target="_blank" title="Megaquest">Megaquest</a> programmieren zu können, musste die Entwicklung meiner eigenen Website kurz nachdem sie begonnen hatte pausieren.
                    Über die Website kann jeder Besucher Verlosungen ablaufen lassen, wobei die Website momentan nur auf <abbr title="Waffentarnungen">Skins</abbr> für das bekannte Spiel <a href="https://de.wikipedia.org/wiki/Counter-Strike:_Global_Offensive" rel="noopener" target="_blank" title="Counter Strike Global Offensive">CS:GO</a> ausgelegt ist.
                    <br>
                    Aus heutiger Sicht ist die <a href="https://github.com/dargmuesli/randomwinpicker/tree/v1" rel="noopener" target="_blank" title="Dargmuesli/randomwinpicker (v1)">erste Version des Quellcodes der Website</a> nicht schön zu lesen.
                    Dennoch war ich sehr zufrieden mit der Website, denn es war die erste, die ich komplett fertiggestellt habe.
                    Die <a href="https://github.com/dargmuesli/randomwinpicker/" rel="noopener" target="_blank" title="Dargmuesli/randomwinpicker">aktuelle Quellcode-Version</a> liest sich deutlich angenehmer.
                </p>
                </section>
        </section>
        <section id="visual-basic" class="section scrollspy">
            <h3>
                Visual Basic
            </h3>
            <p>
                Damals hatte ich vor ein Programm zu schreiben, welches Bilder von Kameras (meist "0001.jpg", "0002.jpg", ... genannt) nach einem bestimmten Format abhängig vom Aufnahmedatum umbenennt und in Ordner sortiert.
                Das Programm war auch recht fertig <i>[ich finde Programme sind nie fertig]</i> und wurde von mir einige Zeit nicht angefasst.
                Nach meinen neuen Erfahrungen aus dem Informatikunterricht und eigenen Projekten habe ich mich dazu entschlossen das Programm neu zu schreiben.
                Dieses mal übersichtlicher, ähnlich einer App gestaltet.
                Nach gründlicher Bug-Suche und ausführlichem Testen habe ich diese Version von <a href="https://github.com/Dargmuesli/batchrename" rel="noopener" target="_blank" title="Github">BatchRename</a> auf GitHub veröffentlicht.
                <br>
                Mit VB habe ich auch Mitte 2016 ein weiteres Tool, <a href="https://github.com/Dargmuesli/cover-extract" rel="noopener" target="_blank" title="CoverExtract">CoverExtract</a>, geschrieben, das ein Frame zu einem angegebenen Zeitpunkt in mehreren Videos als Bild abspeichert.
                Es eignet sich besonders zur Extrahierung von Coverbildern aus Musikvideos.
            </p>
        </section>
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

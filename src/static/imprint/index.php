<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Das Impressum dieser Website mit Kontakt, Bildrechten, Haftungsausschluss und Datenschutzerklärung';
    $skeletonFeatures = ['lcl/ext/js', 'ext/recaptcha/de-async-defer'];

    $skeletonContent = '
    Alle Angaben gemäß § 5 TMG.
    <section id="contact" class="section scrollspy">
        <h2>
            Kon&shy;takt
        </h2>
        <div id="address">
            <form action="layout/ext/extension.js.php" method="post" id="contactform">
                <div data-callback="contactformCallback" class="g-recaptcha" data-sitekey="6LcMvR8TAAAAABoCdUzDCXtdKcIChvVyEqBXGHwT"></div>
            </form>
        </div>
    </section>
    <section id="imagerights" class="section scrollspy">
        <h2>
            Bild&shy;rech&shy;te
        </h2>
        <ul class="collection">
            <li class="collection-item">
                <a href="https://www.flickr.com/" target="_blank" title="Flickr">
                    Flickr
                </a>
                <ul class="collection">
                    <li class="collection-item">
                        <a href="https://www.flickr.com/photos/37996612193@N01" target="_blank" title="Richard Smith">
                            Richard Smith
                        </a>
                        <ul class="collection">
                            <li class="collection-item">
                                <a href="https://commons.wikimedia.org/wiki/File:Green_door,_8_Bloomsbury_Square,_London_WC1.jpg" target="_blank" title="Grüne Tür (Original)">
                                    Green_door,_8_Bloomsbury_Square,_London_WC1.jpg
                                </a>
                                &gt;
                                <a href="../portfolio/documents/school/maths/montyhallproblem/layout/images/greendoor.png" target="_blank" title="Grüne Tür (Bearbeitet)">
                                    greendoor.png
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="collection-item">
                        <a href="https://www.flickr.com/people/67958110@N00" target="_blank" title="Serge Melki">
                            Serge Melki
                        </a>
                        <ul class="collection">
                            <li class="collection-item">
                                <a href="https://commons.wikimedia.org/wiki/File:Red_door_%284707537839%29.jpg" target="_blank" title="Rote Tür (Original)">
                                    Red_door_(4707537839).jpg
                                </a>
                                &gt;
                                <a href="../portfolio/documents/school/maths/montyhallproblem/layout/images/reddoor.png" target="_blank" title="Rote Tür (Bearbeitet)">
                                    reddoor.png
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="collection-item">
                <a href="https://pixabay.com/" target="_blank" title="Pixabay">
                    Pixabay
                </a>
                <ul class="collection">
                    <li class="collection-item">
                        <a href="https://pixabay.com/de/users/Nemo-3736/" target="_blank" title="Nemo">
                            Nemo
                        </a>
                        <ul class="collection">
                            <li class="collection-item">
                                <a href="https://pixabay.com/de/auto-gelb-sport-fahrzeug-30990/" target="_blank" title="Gelbes Auto (Original)">
                                    car-30990_1280.png
                                </a>
                                &gt;
                                <a href="../portfolio/documents/school/maths/montyhallproblem/layout/images/car.png" target="_blank" title="Gelbes Auto (Bearbeitet)">
                                    car.png
                                </a>
                            </li>
                            <li class="collection-item">
                                <a href="https://pixabay.com/de/scheune-bauernhof-gras-ziege-44669/" target="_blank" title="Ziege (Original)">
                                    barn-44669_1280.png
                                </a>
                                &gt;
                                <a href="../portfolio/documents/school/maths/montyhallproblem/layout/images/goat.png" target="_blank" title="Ziege (Bearbeitet)">
                                    goat.png
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="collection-item">
                <a href="https://de.wikipedia.org/" target="_blank" title="Wikipedia">
                    Wikipedia
                </a>
                <ul class="collection">
                    <li class="collection-item">
                        <a href="https://sourceforge.net/projects/mumble/" target="_blank" title="Mumble">
                            Mumble
                        </a>
                        <ul class="collection">
                            <li class="collection-item">
                                <a href="https://de.wikipedia.org/wiki/Mumble#/media/File:Icons_mumble.svg" target="_blank" title="Mumble Logo (Original)">
                                    Icons_mumble.svg
                                </a>
                                &gt;
                                <a href="../portfolio/documents/community/mumble/layout/images/mumble_logo.svg" target="_blank" title="Mumble Logo (Bearbeitet)">
                                    mumble_logo.svg
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="collection-item">
                        <a href="https://www.youtube.com/" target="_blank" title="YouTube">
                            YouTube
                        </a>
                        <ul class="collection">
                            <li class="collection-item">
                                <a href="https://de.wikipedia.org/wiki/Datei:YouTube_icon.png#/media/File:YouTube_icon.png" target="_blank" title="YouTube Icon (Original)">
                                    YouTube_icon.png
                                </a>
                                &gt;
                                <a href="../portfolio/programming/javascript/youtubecalendar/layout/images/youtube-icon.png" target="_blank" title="YouTube Icon (Bearbeitet)">
                                    youtube-icon.png
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="collection-item">
                        Unbekannt
                        <ul class="collection">
                            <li class="collection-item">
                                <a href="https://de.wikipedia.org/wiki/TeamSpeak#/media/File:Teamspeak-Logo.svg" target="_blank" title="TeamSpeak Logo (Original)">
                                    Teamspeak-Logo.svg
                                </a>
                                &gt;
                                <a href="../portfolio/documents/community/mumble/layout/images/teamspeak_logo.svg" target="_blank" title="TeamSpeak Logo (Bearbeitet)">
                                    teamspeak_logo.svg
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <section id="disclaimer" class="section scrollspy">
        <h2>
            Haf&shy;tungs&shy;aus&shy;schluss
        </h2>
        <section>
            <h3>
                § 1 Haf&shy;tungs&shy;be&shy;schrän&shy;kung für In&shy;hal&shy;te
            </h3>
            <p>
                Die Inhalte dieser Seite wurden mit größter Sorgfalt erstellt.
                Für die Richtigkeit, Vollständigkeit und Aktualität der Inhalte kann ich jedoch keine Gewähr übernehmen.
                Als Diensteanbieter bin ich gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich.
                Nach § 8 bis 10 TMG bin ich als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.
                Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt.
                Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich.
                Bei Bekanntwerden von entsprechenden Rechtsverletzungen werde ich diese Inhalte umgehend entfernen.
            </p>
        </section>
        <section>
            <h3>
                § 2 Ex&shy;ter&shy;ne Links
            </h3>
            <p>
                Mein Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte ich keinen Einfluss habe.
                Deshalb kann ich für diese fremden Inhalte auch keine Gewähr übernehmen.
                Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich.
                Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft.
                Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.
                Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar.
                Bei Bekanntwerden von Rechtsverletzungen werde ich derartige Links umgehend entfernen.
                </p>
        </section>
        <section>
            <h3>
                § 3 Ur&shy;he&shy;ber- und Leis&shy;tungs&shy;schutz&shy;rech&shy;te
            </h3>
            <p>
                Die durch den Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht.
                Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.
                Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet.
                Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet.
                Insbesondere werden Inhalte Dritter als solche gekennzeichnet.
                Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitte ich um einen entsprechenden Hinweis.
                Bei Bekanntwerden von Rechtsverletzungen werde ich derartige Inhalte umgehend entfernen.
            </p>
        </section>
        <section>
            <h3>
                § 4 Be&shy;son&shy;de&shy;re Nut&shy;zungs&shy;be&shy;ding&shy;ung&shy;en
            </h3>
            <p>
                Soweit besondere Bedingungen für einzelne Nutzungen dieser Website von den vorgenannten Paragraphen abweichen, wird an entsprechender Stelle ausdrücklich darauf hingewiesen.
                In diesem Falle gelten im jeweiligen Einzelfall die besonderen Nutzungsbedingungen.
            </p>
        </section>
    </section>
    <section id="privacypolicy" class="section scrollspy">
        <h2>
            Da&shy;ten&shy;schutz&shy;erklä&shy;rung
        </h2>
        <section>
            <h3>
                Da&shy;ten&shy;schutz
            </h3>
            <p>
                Ich weise darauf hin, dass die Datenübertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitslücken aufweisen kann.
                Ein lückenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht möglich.
                <br>
                Der Nutzung von im Rahmen der Impressumspflicht veröffentlichten Kontaktdaten durch Dritte zur Übersendung von nicht ausdrücklich angeforderter Werbung und Informationsmaterialien wird hiermit ausdrücklich widersprochen.
                Der Betreiber der Seite behält sich ausdrücklich rechtliche Schritte im Falle der unverlangten Zusendung von Werbeinformationen, etwa durch Spam-Mails, vor.
            </p>
        </section>
        <section>
            <h3>
                Per&shy;so&shy;nen&shy;be&shy;zo&shy;ge&shy;ne Da&shy;ten
            </h3>
            <p>
                Sie können meine Webseite ohne Angabe personenbezogener Daten besuchen.
                Soweit auf meiner Seite personenbezogene Daten (wie Name, Anschrift oder E-Mail Adresse) erhoben werden, erfolgt dies, soweit möglich, auf freiwilliger Basis.
                Diese Daten werden ohne Ihre ausdrückliche Zustimmung nicht an Dritte weitergegeben.
                Sofern zwischen Ihnen und mir ein Vertragsverhältnis begründet, inhaltlich ausgestaltet oder geändert werden soll oder Sie an mich eine Anfrage stellen, erhebe und verwende ich personenbezogene Daten von Ihnen, soweit dies zu diesen Zwecken erforderlich ist (Bestandsdaten).
                Ich erhebe, verarbeite und nutze personenbezogene Daten soweit dies erforderlich ist, um Ihnen die Inanspruchnahme des Webangebots zu ermöglichen (Nutzungsdaten).
                Sämtliche personenbezogenen Daten werden nur solange gespeichert wie dies für den geannten Zweck (Bearbeitung Ihrer Anfrage oder Abwicklung eines Vertrags) erforderlich ist.
                Hierbei werden steuer- und handelsrechtliche Aufbewahrungsfristen berücksichtigt.
                Auf Anordnung der zuständigen Stellen darf ich im Einzelfall Auskunft über diese Daten (Bestandsdaten) erteilen, soweit dies für Zwecke der Strafverfolgung, zur Gefahrenabwehr, zur Erfüllung der gesetzlichen Aufgaben der Verfassungsschutzbehörden oder des Militärischen Abschirmdienstes oder zur Durchsetzung der Rechte am geistigen Eigentum erforderlich ist.
            </p>
        </section>
        <section>
            <h3>
                Goo&shy;gle A&shy;na&shy;ly&shy;tics
            </h3>
            <p>
                Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc. ("Google").
                Google Analytics verwendet sog. "Cookies", Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglicht.
                Die durch den Cookie erzeugten Informationen über Ihre Benutzung dieser Website (einschließlich Ihrer IP-Adresse) wird an einen Server von Google in den USA übertragen und dort gespeichert.
                Google wird diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten für die Websitebetreiber zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen zu erbringen.
                Auch wird Google diese Informationen gegebenenfalls an Dritte übertragen, sofern dies gesetzlich vorgeschrieben oder soweit Dritte diese Daten im Auftrag von Google verarbeiten.
                Google wird in keinem Fall Ihre IP-Adresse mit anderen Daten der Google in Verbindung bringen.
                Sie können die Installation der Cookies durch eine entsprechende Einstellung Ihrer Browser Software verhindern.
                Ich weise Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website voll umfänglich nutzen können.
                Durch die Nutzung dieser Website erklären Sie sich mit der Bearbeitung der über Sie erhobenen Daten durch Google in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck einverstanden.
            </p>
        </section>
        <!--<section>
            <h3>
                Goo&shy;gle Ad&shy;Sense
            </h3>
            <p>
                Diese Website benutzt Google Adsense, einen Webanzeigendienst der Google Inc., USA ("Google").
                Google Adsense verwendet sog. "Cookies" (Textdateien), die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglicht.
                Google Adsense verwendet auch sog. "Web Beacons" (kleine unsichtbare Grafiken) zur Sammlung von Informationen.
                Durch die Verwendung des Web Beacons können einfache Aktionen wie der Besucherverkehr auf der Webseite aufgezeichnet und gesammelt werden.
                Die durch den Cookie und/oder Web Beacon erzeugten Informationen über Ihre Benutzung diese Website (einschließlich Ihrer IP-Adresse) werden an einen Server von Google in den USA übertragen und dort gespeichert.
                Google wird diese Informationen benutzen, um Ihre Nutzung der Website im Hinblick auf die Anzeigen auszuwerten, um Reports über die Websiteaktivitäten und Anzeigen für die Websitebetreiber zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen zu erbringen.
                Auch wird Google diese Informationen gegebenenfalls an Dritte übertragen, sofern dies gesetzlich vorgeschrieben oder soweit Dritte diese Daten im Auftrag von Google verarbeiten.
                Google wird in keinem Fall Ihre IP-Adresse mit anderen Daten der Google in Verbindung bringen.
                Das Speichern von Cookies auf Ihrer Festplatte und die Anzeige von Web Beacons können Sie durch eine entsprechende Einstellung Ihrer Browser Software verhindern.
                Ich weise Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website voll umfänglich nutzen können.
                Durch die Nutzung dieser Website erklären Sie sich mit der Bearbeitung der über Sie erhobenen Daten durch Google in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck einverstanden.
            </p>
        </section>-->
        <section>
            <h3>
                Aus&shy;kunft, Lö&shy;schung, Sper&shy;rung
            </h3>
            <p>
                Sie haben jederzeit das Recht auf unentgeltliche Auskunft über Ihre gespeicherten personenbezogenen Daten, deren Herkunft und Empfänger und den Zweck der Datenverarbeitung sowie ein Recht auf Berichtigung, Sperrung oder Löschung dieser Daten.
                Hierzu sowie zu weiteren Fragen zum Thema personenbezogene Daten können Sie sich jederzeit über die im Impressum angegeben Adresse des Webseitenbetreibers an mich wenden.
            </p>
        </section>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent, $skeletonFeatures);

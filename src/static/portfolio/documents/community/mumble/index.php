<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Eine ernstzunehmende Teamspeak-Alternative';
    $skeletonContent = '
    <div class="row">
        <div class="col s12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">
                        Ver&shy;al&shy;tet!
                    </span>
                    <p>
                        Dieser Artikel ist nicht mehr aktuell.
                        Mittlerweile hat sich Diskord etabliert.
                    </p>
                </div>
                <div class="card-action">
                    <a href="https://discordapp.com/" rel="noopener" target="_blank">
                        discordapp.com
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section id="versus" class="section scrollspy">
        <h2 class="center-align">
            Mum&shy;ble vs. Team&shy;Speak
        </h2>
        <div class="row">
            <img class="materialboxed responsive-img col s3 push-s2 l1" src="layout/images/mumble-logo.svg">
            <img class="materialboxed responsive-img col s3 push-s4 l1 hide-on-large-only" src="layout/images/teamspeak-logo.svg">
            <p class="col s10">
                <a href="https://wiki.mumble.info/wiki/Main_Page" title="Mumble">Mumble</a> ist wie <a href="https://www.teamspeak.de/" title="Mumble">TeamSpeak</a> eine <a href="https://de.wikipedia.org/wiki/IP-Telefonie" title="IP-Telefonie">VoIP-Software</a>, die primär für Gamer gedacht ist.
                Im Fokus stehen dabei eine niedrige Latenz bzw. spezielle Codecs und der Funktionsumfang.
                <br>
                Mumble und TeamSpeak sind von der Benutzung und Konfiguration beide größtenteils identisch.
                Tonnormalisierung, Rauschfilter und Echounterdrückung sind bei Mumble Standard und funktionieren sehr gut.
                Ein Unterschied zu TeamSpeak ist aber die Verschlüsselung der Kommunikation und Identifikation der Teilnehmer über Zertifikate.
                Beide Clients unterstützen natürlich Themes/Skins.
            </p>
            <img class="materialboxed responsive-img col l1 hide-on-med-and-down" src="layout/images/teamspeak-logo.svg">
        </div>
        <section class="left-align">
            <h4>
                Of&shy;fe&shy;ne Quel&shy;len
            </h4>
            <p>
                Im Gegensatz zu TeamSpeak ist <a href="https://github.com/mumble-voip/mumble" title="Mumble - A voicechat utility for gamers">Mumble Open-Source</a>, was ein großer Vorteil ist.
                Denn so wird Mumble ständig weiterentwickelt und kann theoretisch auf allen Betriebssystemen/Architekturen zum Laufen gebracht werden.
            </p>
        </section>
        <section class="left-align">
            <h4>
                App
            </h4>
            <p>
                <a href="https://play.google.com/store/apps/details?id=com.morlunk.mumbleclient" title="Plumble - Mumble VOIP">Plumble</a> ist eine kostenlose Android-App, mit der man auf Mumble-Server zugreifen kann.
                Es gibt zwar auch <a href="https://play.google.com/store/apps/details?id=com.teamspeak.ts3client" title="TeamSpeak 3">TeamSpeaks offizielle App</a>, diese kostet aber mehr als 1,50€.
            </p>
        </section>
        <section class="left-align">
            <h4>
                Ver&shy;schlüs&shy;sel&shy;ung & I&shy;den&shy;ti&shy;fi&shy;ka&shy;tion
            </h4>
            <p>
                Die Kommunikation von Mumble kann und sollte über eigene SSL-Zertifikate verschlüsselt werden, da nur Mumble diese Möglichkeit bietet.
                Im gleichen Zug lassen sich so Benutzer eindeutig identifizieren, was bei der Rechteverwaltung hilfreich ist.
                Die Installation der Zertifikate ist wahrscheinlich neu für erstmalige Benutzer von Mumble, die Komplexität wurde von Mumble aber sehr elegant vereinfacht.
            </p>
        </section>
        <section class="left-align">
            <h4>
                Hos&shy;ting
            </h4>
            <p>
                Neben der Tatsache, dass sich nur Mumble auf der <a href="https://de.wikipedia.org/wiki/ARM-Architektur" title="Wikipedia: ARM-Architektur">ARM-Architektur</a> ausführen lässt, ist die Server-Software ressourcenschonender und es gibt praktisch kein Slot-Limit.
                Über privates Hosting hat man die volle Kontrolle über den Server.
            </p>
        </section>
        <section class="center-align">
            <h4>
                La&shy;tenz
            </h4>
            <p>
                Mumble hat eine ausgesprochen niedrige Latenz, was bedeutet, dass die Zeit zur Übertragung von Tönen minimal ist.
                Ermöglicht wird das größtenteils durch den OPUS-Codec, der den Ton effizient komprimiert.
                TeamSpeak hat in Version 3 auch eine im Vergleich zur Konkurrenz niedrige Latenz.
            </p>
        </section>
        <section class="center-align">
            <h4>
                Spiel-In&shy;te&shy;gri&shy;tät
            </h4>
            <p>
                Bereits eingebaut in Mumble ist ein Ingame-Overlay, sodass man ohne zweiten Monitor erkennen kann wer zu einem spricht und wer stummgeschaltet ist.
                TeamSpeak hat an dieser Stelle das zusätzliche Programm <a href="https://www.overwolf.com/teamspeak/" title="Overwolf">Overwolf</a>.
                <br>
                Mumble bietet außerdem über Plugins die Funktion die Tonausgabe anderer Gesprächsteilnehmer abhängig von der Ingame-Position ihres Charakters im Raum zu verteilen.
                Jedoch kann bei Updates von Spielen die Plugin-Integrität zerstört werden.
                Mumble ermöglicht aber es jedem Entwickler entsprechende Fixes zu programmieren.
                TeamSpeak hat bisher nur die Möglichkeit, Audioquellen manuell und statisch im Raum zu positionieren.
            </p>
        </section>
        <section class="right-align">
            <h4>
                Mul&shy;ti&shy;tas&shy;king
            </h4>
            <p>
                Hier ist TeamSpeak der klare Gewinner.
                Dort kann man sich über Tabs mit mehreren Servern gleichzeitig verbinden, was bei Mumble aktuell noch nicht möglich ist.
            </p>
        </section>
        <section class="right-align">
            <h4>
                Da&shy;tei&shy;trans&shy;fer
            </h4>
            <p>
                Auch hier bietet nur TeamSpeak direkt eingebaut die Möglichkeit, Dateien direkt auf den Server zu laden.
                Wer Mumble nutzt, sollte dafür in etwa einen Dropbox-Account haben.
            </p>
        </section>
        <section class="center-align">
            <h3>
                Fa&shy;zit
            </h3>
            <p class="left-align">
                Mumble 1.3 ist so intuitiv und schnell wie TeamSpeak.
                Während TeamSpeak Multitasking und Dateitransfers ermöglicht, wird bei Mumble die Tonqualität deutlich optimiert und echter ingame 3D-Sound.
                Mumble wird hingegen offen und beständig weiterentwickelt.
                Außerdem wird bei Mumble die Verbindung über SSL-Zertifikate verschlüsselt und es gibt eine kostenlose App für Android.
            </p>
        </section>
        <div class="divider">
        </div>
        <section>
            <h4>
                Quel&shy;len
            </h4>
            <p>
                <ol>
                    <li>
                        Eigene Erfahrung
                    </li>
                    <li>
                        <a href="https://www.toptenreviews.com/computers/articles/the-best-voip-software-for-gaming-mumble-vs.-teamspeak-3/" title="The Best VoIP Software for Gaming: Mumble vs. TeamSpeak 3">"The Best VoIP Software for Gaming: Mumble vs. TeamSpeak 3"</a> von Kyle Rollins
                    </li>
                    <li>
                        <a href="https://www.remumble.com/mumble.htm" title="Why Mumble?">Why Mumble?</a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/watch?v=gblGcmtnJTY" title="Mumble vs Teamspeak 3 vs Ventrilo">Mumble vs Teamspeak 3 vs Ventrilo</a> von GCKorgath.
                    </li>
                </ol>
            </p>
        </section>
    </section>
    <section id="screenshots" class="section scrollspy">
        <h2>
            Screen&shy;shots
        </h2>
        <p>
            Ein Vergleich zwischen den beiden Benutzeroberflächen.
        </p>
        <div class="row">
            <div class="col s12 l6">
                <h3 class="center-align">
                    Mum&shy;ble
                </h3>
                <p>
                    <img alt="Mumble Screenshot" class="materialboxed responsive-img" src="layout/images/screenshot-mumble.png">
                </p>
            </div>
            <div class="col s12 l6">
                <h3 class="center-align">
                    Team&shy;Speak
                </h3>
                <p>
                    <img alt="Teamspeak Screenshot" class="materialboxed responsive-img" src="layout/images/screenshot-teamspeak.png">
                </p>
            </div>
        </div>
    </section>
    <section id="installation" class="section scrollspy">
        <h2>
            In&shy;stal&shy;la&shy;tion
        </h2>
        <p>
            Die Installation von Mumble ist für Benutzer sehr einfach.
            Alle Downloads können auf der <a href="https://wiki.mumble.info/wiki/Main_Page" title="Mumble">Hauptseite des Wikis</a> gefunden werden.
            Dabei sind aktuell wegen der deutlich verbesserten Benutzeroberfläche Snapshots der Version 1.3.x den stabilen Builds der Versionsreihe 1.2.x vorzuziehen.
            Windows-Nutzer (x64) erhalten unter folgendem Link eine .msi-Datei der Version 1.3.0.1703 zum Installieren:
        </p>
        <p>
            <a class="waves-effect waves-light btn" href="https://dl.mumble.info/mumble-1.3.0~1703~gf47df77~snapshot.msi" title="Mumble Snapshot">
                <i class="material-icons left">
                    file_download
                </i>
                Download
            </a>
        </p>
        <p>
            Dann - wie gewohnt - den Installer ausführen und auf "weiter" klicken, den Lizenzvereinbarungen zustimmen, "weiter" klicken, eventuell den Speicherort ändern, "weiter" und "Installieren" klicken.
            Falls eine Warnung der Benutzerkontensteuerung auftaucht, diese bestätigen.
            Danach "Fertig stellen" und optional gleich "Mumble starten" anwählen.
        </p>
    </section>
    <section id="configuration" class="section scrollspy">
        <h2>
            Kon&shy;fi&shy;gu&shy;ra&shy;tion
        </h2>
        <section>
            <h3>
                Audio Ein&shy;stel&shy;lungs-As&shy;sis&shy;tent
            </h3>
            <p>
                Beim ersten Start zeigt Mumble den Audio Einstellungs-Assistent.
                <br>
                Nachdem einmal auf "weiter" geklickt wurde müssen die richtigen Audio Ein- und Ausgabegeräte ausgewählt werden.
                Richtig hat man es dann gemacht, wenn man sich selbst hört über die Lautsprecher/Kopfhörer hört.
            </p>
            <p>
                Im nächsten Schritt bewegt man den Schieberegler auf den niedrigst möglichen Wert, bei dem sich der abgespielte Ton noch nicht gestört wird.
            </p>
            <p>
                Daraufhin soll man den Pegel und einen etwaig vorhandenen Boost des Mikrofons in den Betriebssystemeinstellungen auf maximal stellen und aufgeregt sprechen.
                Dabei regelt man das Mikrofon dann wieder soweit runter, dass der ausschlagende Balken nicht mehr in den roten Bereich kommt.
                Danach soll leise gesprochen werden und mit dem unteren Schieberegler das blaue Feld für Stille eingestellt werden.
            </p>
            <p>
                Im Schritt "Sprachaktivitätserkennung" funkioniert meiner Erfahrung nach der Wert "Rohampitude der Eingabe" ganz gut.
                Ein weiterer Schieberegler solle hier auf die Position gebracht werden, die Sprache von Stille unterscheidet.
            </p>
            <p>
                Je nach Bandbreite kann im darauffolgenden Schritt die Qualitätseinstellung vorgenommen werden.
                Darunter kann man konfigurieren, ob Benachrichtigungen vorgelesen oder durch einen Ton ausgedrückt werden sollen.
                Ich empfehle nur Töne zu verwenden, da sich die Text-To-Speech-Engine etwas gewöhnungsbedürftig anhört.
            </p>
            <p>
                Nun folgt im Installer eine Demo für positionsabhängiges Audio.
                Wer Kopfhörer nutzt, sollte die entsprechende Checkbox aktivieren.
            </p>
            <p>
                Zum Schluss kann man das Projekt noch über anonyme Statistiken unterstützen.
            </p>
        </section>
        <section>
            <h3>
                Zer&shy;ti&shy;fi&shy;kat-Ma&shy;nage&shy;ment
            </h3>
            <p>
                An <a href="https://secure.comodo.com/products/frontpage?area=SecureEmailCertificate" title="Application for Secure Email Certificate">vielen Stellen im Internet</a> wird das Verlieren eines Zertifikats fast mit einem Weltuntergang gleichgesetzt.
                Das kann beängstigend wirken, ist aber natürlich vollkommen übertrieben.
                Sie sind wichtig, da durch sie Verschlüsselung überhaupt erst ermöglicht wird!
                Für den normalen Benutzer von Mumble reicht es, sich ein Zertifikat automatisch erstellen zu lassen bzw. ein neues Zertifikat mit Namen und E-Mail zu erstellen.
                Dieses Zertifikat ist jedoch selbst-signiert und daher nur begrenzt vertrauenswürdig, was hier jetzt aber keine große Rolle spielt.
                <br>
                Wer einen Schritt weiter gehen möchte, noch kein persönliches Zertifikat hat und sich bei dieser Gelegenheit ein solches generieren lassen möchte, dem empfehle ich <a href="https://wiki.mumble.info/wiki/Obtaining_a_Comodo_Certificate" title="Obtaining a Comodo Certificate">diesen Eintrag im Mumble-Wiki</a>.
                Vorteil des Ganzen ist: Solange man Zugriff auf das Zertifikat hat und es gültig ist, gerät die Identität z.B. bei einer Neuinstallation des Betriebssystems verloren, wie es schnell bei TeamSpeak passieren kann.
                <br>
                Wer bereits ein Zertifikat hat, kann es einfach importieren.
            </p>
        </section>
        <section>
            <h3>
                Ser&shy;ver-Brow&shy;ser
            </h3>
            <p>
                Bei jedem Start zeigt Mumble standardmäßig den Server-Browser.
                Entweder hier unter "Internet - Öffentlich" > "Europa" > "Germany" den Servernamen "SquadGamers" suchen oder den Server manuell hinzufügen.
            </p>
            <p>
                <img class="materialboxed responsive-img" src="layout/images/server-data.png">
            </p>
        </section>
        <section>
            <h3>
                O&shy;ber&shy;flä&shy;che
            </h3>
            <p>
                Ich rate, einen Snapshot der Versionsreihe 1.3.x zu installieren.
                Denn in der derzeit stabilen Version 1.2.x sieht Mumble nicht sonderlich ansprechend aus.
                Ein Butten dafür kann weiter oben gefunden werden.
            <p>
                Es gibt aber auch Skins und ab v1.3 Themes!
                Mit diesen lässt sich die Oberfläche den individuellen Wünschen anpassen.
            </p>
            <p>
                Des Weiteren empfehle ich über "Konfiguration" > "Einstellungen" > "Benutzerinterface" die Anordnung auf "Gestapelt" zu setzen.
                So werden in TS3 ebenfalls die Bereiche angeordnet.
                Um wie in TS3 alle Channel automatisch einsehen zu können, muss im selben Fenster unten links der Haken bei "Erweitert" gesetzt werden und daraufhin unter "Kanalbaum" > "Expandieren" "Alle" ausgewählt werden.
            </p>
    </section>';

    output_html($skeletonDescription, $skeletonContent);

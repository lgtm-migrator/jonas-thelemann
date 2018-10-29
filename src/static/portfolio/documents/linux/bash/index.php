<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Praktische Scripts und Shortcuts für die Administration meines Servers';
    $skeletonFeatures = ['pkg/prsm/coy.css', 'pkg/prsm/js'];
    $skeletonContent = '
    <section id="aliases" class="section scrollspy">
        <h2>
            Aliasse
        </h2>
        <p>
            Im Benutzerordner befindet sich unter Ubuntu die <code class="language-markup">.bash_aliases</code>-Datei.
            In ihr lassen sich zeilenweise Abkürzungen oder Alternativschreibweisen für Kommandozeilenbefehle definieren.
            Im Folgenden zeige und erkläre ich die Aliasse.
            Weitere Informationen findet man bei den <a href="https://wiki.ubuntuusers.de/alias/" rel="noopener" target="_blank" title="Alias">UbuntuUsers</a>.
        </p>
        <section>
            <h3>
                Dienste neustarten
            </h3>
            <p>
                Ich habe mich zum Neustarten von Diensten für Abkürzungen bestehend aus "re" für "restart" und der Abkürzung für den jeweiligen Dienst entschieden.
                Für den Apache Webserver und den Mumble VoIP-Server lautet der Alias so.
            </p>
            <pre>
                <code class="language-bash line-numbers">
                    # Apache
                    alias reap=\'sudo service apache2 restart\'
                    <br>
                    # Mumble
                    alias remu=\'sudo /etc/init.d/mumble-server restart\'
                </code>
            </pre>
        </section>
        <section>
            <h3>
                Logs anzeigen/löschen
            </h3>
            <p>
                Die folgenden Aliasse zeigen mit <code class="language-bash">tail</code> die letzten Zeilen im jeweilig definierten Log an.
                Die Zusammensetzung besteht aus Dienstabkürzung und "log".
            </p>
            <pre>
                <code class="language-bash line-numbers">
                    # Apache
                    alias aplog=\'tail /var/log/apache2/error.log\'
                    <br>
                    # Fail2Ban
                    alias f2blog=\'tail /var/log/fail2ban.log\'
                    <br>
                    # Postgresql
                    alias pglog=\'tail /var/log/postgresql/postgresql-9.4-main.log\'
                </code>
            </pre>
            <p>
                Zum Löschen des jeweiligen Logs wird der Programmabkürzung und dem Begriff "log" ein "de" eingeschoben.
                Da die Log-Dateien in den meisten Fällen nur über <code class="language-bash">sudo</code> bearbeitet werden können, muss dem Bash-Befehl ein weiterer Bash-Befehl untergeordnet werden.
            </p>
            <pre>
                <code class="language-bash line-numbers">
                    # Apache
                    alias apdelog=\'sudo bash -c "> /var/log/apache2/error.log"\'
                    <br>
                    # Fail2Ban
                    alias f2bdelog=\'sudo bash -c "> /var/log/fail2ban.log"\'
                    <br>
                    # Postgresql
                    alias pgdelog=\'sudo bash -c "> /var/log/postgresql/postgresql-9.4-main.log"\'
                </code>
            </pre>
        </section>
        <section>
            <h3>
                Navigation
            </h3>
            <p>
                Wer die grafischen Steuerung seines Servers über Remote-Desktop-Protokolle deaktiviert hat und über SSH zugreift, benötigt man oft Befehle wie <code class="language-bash">ls</code> oder <code class="language-bash">cd</code>.
            </p>
            <pre>
                <code class="language-bash line-numbers">
                    # Apache
                    alias cdap=\'cd /etc/apache2/\'
                    <br>
                    # Nutzer
                    alias cdh=\'cd ~\'
                </code>
            </pre>
            <p>
                Ein Überblick über die Ordnerstruktur und Belegung der Festplatte(n) liefern folgende Kommados.
            </p>
            <pre>
                <code class="language-bash line-numbers">
                    # Belegung per Ordner
                    alias diskusage=\'sudo ncdu -x /\'
                    <br>
                    # Belegung per Medium
                    alias space=\'df -h\'
                </code>
            </pre>
            <pre>
                <code class="language-bash line-numbers">
                    # Inhalt des aktuellen Ordners
                    alias l=\'ls -la\'
                </code>
            </pre>
            <p>
                Schneller bearbeitet man Textdateien so.
            </p>
            <pre>
                <code class="language-bash line-numbers">
                    # Bearbeitung als Chef
                    alias sn=\'sudo nano\'
                </code>
            </pre>
        </section>
        <section>
            <h3>
                Betriebssystem
            </h3>
            <p>
                Zum Neustarten und Herunterfahren dienen bei mir diese Befehlsabkürzungen.
            </p>
            <pre>
                <code class="language-bash line-numbers">
                    # Neustarten
                    alias reboot=\'sudo reboot\'
                    <br>
                    # Herunterfahren
                    alias shutdown=\'sudo shutdown -h 0\'
                </code>
            </pre>
            <p>
                Eine umfassende Aktualisierung der installierten Pakete übernimmt dieses Kommando.
            </p>
            <pre>
                <code class="language-bash line-numbers">
                    # Aktualisierung und Aufräumen
                    alias refresh=\'sudo apt-get update && sudo apt-get upgrade && sudo apt-get autoremove && sudo apt-get autoclean\'
                </code>
            </pre>
        </section>
        <section>
            <h3>
                Website
            </h3>
            <p>
                Zwei Kommandos, die ich zur Instandhaltung meiner Website häufig benötige, sind die nächsten zwei.
                Mit dem ersten passe ich die Rechte aller Dateien im <code class="language-markup">html</code>-Ordner meines Webservers an.
                Mit dem zweiten wird eine neue Version der CSS-Datei von SASS zusammengesetzt.
            </p>
            <pre>
                <code class="language-bash line-numbers">
                    # Alle Dateien bearbeitbar machen
                    alias chweb=\'sudo chown -R jonas:www-data /var/www/html/* && sudo chmod -R 775 /var/www/html/*\'
                    <br>
                    # Stylesheets aktualisieren
                    alias cssup=\'sudo sass /var/www/html/jonas-thelemann.de/layout/style/materialize/sass/ghpages-materialize.scss:/var/www/html/jonas-thelemann.de/layout/style/materialize/materialize.min.css --style compressed\'
                </code>
            </pre>
        </section>
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

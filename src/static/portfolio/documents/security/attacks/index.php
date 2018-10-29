<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Auflistung von Sicherheitslücken und Gegenmaßnahmen';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = '
    <section id="fail2ban" class="section scrollspy">
        <h2>
            Fail2Ban
        </h2>
        <p>
            Nachdem ich meinen Server Anfang November 2016 neu aufgesetzt habe und den Firewall-Hilfsdienst <a href="http://www.fail2ban.org/" rel="noopener" target="_blank" title="fail2ban.org">Fail2Ban</a> eingerichtet habe, wurde mir relativ schnell bewusst, dass sich die Existenz meines kleinen Servers im Netz schon ziemlich weit herumgesprochen haben muss.
            Ich stellte fest, dass täglich von zwei bis drei IP-Adressen versucht wurde, eine Anmeldung unter dem Benutzernamen "root" durchzuführen.
            Problem A) für die Angreifer: Dieser Benutzer existiert nicht.
            Problem B) die angreifenden IP-Adressen wurden nach 5 Versuchen für 15 Minuten blockiert.
            Die ersten von mir bemerkten Angriffsversuche versuchten alle per <a href="https://de.wikipedia.org/wiki/Brute-Force-Methode" rel="noopener" target="_blank" title="Brute-Force-Methode">Brute-Force</a> auf den SSH-Port Zugang auf meinen Server zu erlangen.
        </p>
        <p>
            Mein Fazit war, die Ban-Regeln zu verschärfen, sodass potentielle Angreifer nun statt 15 Minuten 30 Minuten blockiert werden und davor nur noch 3 Anmeldeversuche zugelassen werden.
            Was ich nicht für nötig gehalten habe, war den Port zu ändern.
            Für die paar Angriffsversuche lohnt es sich meiner Meinung aber nach noch nicht, die nötigen zusätzlichen Konfigurationen vorzunehmen und auf den Komfort von funktionalen Standardkonfigurationen in FileZilla und Putty zu verzichten.
        </p>
        <p>
            Mitte Januar 2017 musste ich endlich etwas ändern.
            1.800 E-Mails, die mir von Angriffsversuchen berichteten, befanden sich mittlerweile in meinem Mailordner.
            Das heißt: täglich trafen E-Mails von mittleren zweistelligen Beträgen ein.
            Meine erste Idee war es also, mir ein paar Statistiken anzeigen zu lassen, über die ich erkennen kann, was das hauptsächliche Problem ist.
            Es könnten ja einzelne Angreifer sein, die nicht locker lassen, oder immer wieder neue, die schnell aufgeben oder eine Mischung von beiden.
        </p>
        <section id="statistic" class="section scrollspy">
            <h3>
                Statistiken
            </h3>
            <p>
                Hier sind die Top 10 IPs der Angreifer nach Häufigkeit insgesamt:
            </p>
            <div id="top10"></div>
            <p>
                Wie viele Angriffe auf meinen Server pro Tag einprasseln wird hier ersichtlich:
            </p>
            <div class="center-align" id="attacksperday"></div>
            <p>
                Zu welcher Uhrzeit die meisten Angriffe eintreffen:
            </p>
            <div class="center-align" id="attacksperhours"></div>
        </section>
        <section id="fail2ban" class="section scrollspy">
            <h3>
                Die Angreifer
            </h3>
            <p>
                Die IP-Adressen der Angreifer möchte ich natürlich niemandem vorenthalten.
                Deshalb werden sie hier automatisch in die Hall-of-Attackers-Liste eingefügt:
            </p>
            <div class="center-align" id="banlist"></div>
        </section>
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

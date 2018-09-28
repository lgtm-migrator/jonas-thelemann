<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    // Load .env file
    load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

    // Get database handle
    $dbh = get_dbh($_ENV['PGSQL_DATABASE']);

    // Initialize the required table
    init_table($dbh, 'private_data');

    $age = 'Es fehlen Daten in der Datenbank';

    if ($birthDate = $dbh->query('SELECT value FROM private_data WHERE key = \'birthdate\'')->fetch()[0]) {
        $birthDate = explode('.', $birthDate);
        $age = (date('md', date('U', mktime(0, 0, 0, $birthDate[1], $birthDate[0], $birthDate[2]))) > date('md') ? ((date('Y') - $birthDate[2]) - 1) : (date('Y') - $birthDate[2]));
    }

    $faq = [
        'compensation' => [
            0 => 'Wel&shy;che Ent&shy;schä&shy;di&shy;gung muss ich für mei&shy;ne un&shy;pas&shy;sen&shy;den Fra&shy;gen und Aus&shy;sa&shy;gen zah&shy;len?',
            1 => '
            <p>
                Nachdem mir in der Abizeitung eine Zukunft als Millionär prophezeit würde, muss ich mich nun um die ersten Einnahmen kümmern.
                Mit dem Antreffen meiner Persönlichkeit akzeptieren Sie deshalb ab dem 25.06.16 die APB (allgemeine Preisbestimmungen).
                <br>
                Entnehmen Sie die Antwort auf obige Frage bitte der folgenden Liste.
                Die Preise orientieren sich am ständig variierenden Grad der durch sie bei mir entstehenden Übelkeit.
                Also Achtung, sie wird bei Bedarf aktualisiert!
            </p>
            <table>
                <thead>
                    <tr>
                        <th>
                            Frage / Aussage
                        </th>
                        <th>
                            Vergütung
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <s>"Und was machst du so nach dem Abi?" / "Wann kümmerst du dich um deine berufliche Zukunft?"</s>
                        </td>
                        <td>
                            <s>20€</s>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            "Jonathan"
                        </td>
                        <td>
                            3€
                        </td>
                    </tr>
                </tbody>
            </table>'
        ],
        'refugees' => [
            0 => 'Wieso hast du so viel mit Flüchtlingen zu tun?',
            1 => '
            <p>
                Am Friedrichsgymnasium gab es einmal die Woche nachmittags einen Sportkurs für Geflüchtete, zu dem auch Schüler der Schule eingeladen waren.
                Als ich dann nach dem Abitur nicht mehr so viel zu tun hatte, bin ich da einfach mal mit einer Schulfreundin hingegangen.
                Ziemlich schnell war klar, dass die Jungs und Mädels alle korrekt sind.
                Ein paar Tage darauf haben wir sie dann in ihrer Flüchtlingsunterkunft besucht und uns mit ihnen unterhalten, Fußball gespielt und Tee getrunken.
                Seitdem unternehme ich öfter etwas mit ihnen oder fahre mal vorbei um draußen auf dem Trainingsplatz ein paar Klimmzüge mit den <abbr title="Refugees">Refs</abbr> zu machen.
            </p>
            <h3 class="chip">
                TL;DR
            </h3>
            <p>
                Weil sie zu meinen Freunden gehören.
            </p>'
        ],
        'age' => [
            0 => 'Wie alt bist du?',
            1 =>
            $age.'.'
        ]
    ];

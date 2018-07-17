<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    lastModified(getPageModTime());

    $open = false;

    $dbh = getDbh($_ENV['PGSQL_DATABASE']);
    $stmt = $dbh->prepare('SELECT riese FROM awards WHERE ip = :ip');
    $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

    if (!$stmt->execute()) {
        throw new PDOException($stmt->errorInfo()[2]);
    }

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_GET[state] = 'done';
    }

    $skeletonDescription = 'Eine Umfrage für die Abizeitung des Friedrichsgymnasiums in Kassel 2016';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = '
    <section id="status" class="section scrollspy">
        <h2>
            Status
        </h2>
        <div class="row">
            <div class="col s12">
                <div class="card info">
                    <div class="card-content">
                        <span class="card-title">
                            Um&shy;fra&shy;ge be&shy;en&shy;det
                        </span>
                        <p>
                            Die Funktion der Seite wird aber dennoch eingeschränkt erhalten bleiben, damit die Funktionsweise von Interessierten eingesehen werden kann.
                            <br>
                            Dazu sind alle Namen anonymisiert und das Script zum Eintragen in die Datenbank deaktiviert worden. Auf der Auswertungsseite sind ebenfalls alle Namen ersetzt worden.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <p>
            <a class="waves-effect waves-light btn" href="analysis/" title="Auswertung">
                <i class="material-icons right">
                    chevron_right
                </i>
                Zur Auswertung
            </a>
        </p>
    </section>
    <section id="survey" class="section scrollspy">
        <h2>
            Umfrage
        </h2>
        <div class="row">
            <form action="layout/extension/save.php?method=bug" class="col s12" method="post">
                <div class="col s12">
                    <h3>
                        Kor&shy;rek&shy;tur
                    </h3>
                    <p>
                        Da es beim Schüleraward "Riese" nur Lehrernamen zur Auswahl gab, kannst du hier deine Wahl nochmal ändern:
                    </p>
                </div>
                <div class="input-field col s12 m8 l6">
                    <select name="Riese">
                        <option value="" disabled selected>Auswählen ...</option>
                    </select>
                    <label>Riese</label>
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">
                        Senden
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
            <form action="layout/extension/save.php" class="col s12" method="post">
                <div id="student" class="col s12 m6">
                    <h3>
                        Schü&shy;ler&shy;a&shy;wards
                    </h3>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Gotteskind">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Gotteskind</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Partyraucher">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Partyraucher</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Frisur">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>„Die Frisur“</label>
                            </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Mami">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Mami</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Sarkasmus">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Mr./ Mrs. Sarkasmus</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Träumer">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Träumer</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Shopaholik">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Shopaholik</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Markenwerbetafel">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Markenwerbetafel</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Sextanerblase">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Sextanerblase</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Auslandskorrespondent">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Auslandskorrespondent</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="DAM">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Dat Ass Männlich</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="DAW">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Dat Ass Weiblich</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="SeeleS">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Gute Seele</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Hobbypsychologe">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Hobbypsychologe</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Sanitäter">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Sanitäter</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Schauspieler">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Schauspieler</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Handysuchti">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Handysuchti</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Vielfraß">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Vielfraß</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12">
                            <div class="row">
                                <select name="Ehepaar1" class="col s5 offset-s1">
                                    <option value="" disabled selected>Auswählen ...</option>
                                </select>
                                <select name="Ehepaar2" class="col s5">
                                    <option value="" disabled selected>Auswählen ...</option>
                                </select>
                                <label>Altes Ehepaar</label>
                            </div>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Weltenbummler">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Weltenbummler</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Starfotograf">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Starfotograf</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Stock">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Stock im Arsch</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Wutbürger">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Wutbürger</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Backmeister">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Backmeister/in</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Ordnungsamt">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Ordnungsamt</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Chemiker">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Chemiker</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Diskussion">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Ewige Diskussion</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Quasselstrippe">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Quasselstrippe</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Hausaufgabe">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>„Wir hatten etwas auf?!“</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Öko">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Öko</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Revoluzzer">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Revoluzzer</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Sauklaue">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Sauklaue</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Girl">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Sweetes Girl</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Vorgelernt">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Vorgelernt</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Entscheidungsunfähig">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Entscheidungsunfähig</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Prinzessin">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Disney-Prinzessin</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Sprachtalent">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Sprachtalent</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Gemein">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>klein, aber gemein</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Genie">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>verkanntes Genie</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Punktefeilscher">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Punktefeilscher</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Anti">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Anti Alles</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Männerschwarm">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Männerschwarm</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Frauenheld">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Frauenheld</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Festivalgänger">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Festivalgänger</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Altphilologe">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Altphilologe</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Rock">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Rock\'n Roll</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Klausurnachbar">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Bester Klausurnachbar</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Naturbursche">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Naturbursche</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Riese">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Riese</label>
                        </div>
                    </p>
                </div>
                <div id="teacher" class="col s21 m6">
                    <h3>
                        Leh&shy;rer&shy;a&shy;wards
                    </h3>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Drecksack">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Drecksack</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Organisationsdesaster">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Organisationsdesaster</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Junggeselle">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Ewiger Junggeselle</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Schlaftablette">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Schlaftablette</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Feministin">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Feministin</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Notenwürfler">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Notenwürfler</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Punktelieferant">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Punktelieferant</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Ähm">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>„Erst reden, dann... ähm...“</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Pause">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>„Gibt keine Pause!“</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="SeeleL">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Gute Seele</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Unterricht">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Alles außer Unterricht</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Eingebildet">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Eingebildet</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Spät">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>„Tut mir ja leid, dass ich zu spät bin, aber ...“</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Unbekannt">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Kenn ich nicht</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Schülerliebling">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Schülerliebling</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Miesepeter">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Miesepeter</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Moralapostel">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Moralapostel</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Verplant">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Verplant</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Dressed">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Best Dressed</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Kopierkönig">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Kopierkönig</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Grinsekatze">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Grinsekatze</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Tafelbild">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Das Tafelbild</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Gartenzwerg">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Gartenzwerg</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Übermotiviert">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Übermotiviert</label>
                        </div>
                    </p>
                    <p>
                        <div class="input-field col s12 l6">
                            <select name="Sprücheklopfer">
                                <option value="" disabled selected>Auswählen ...</option>
                            </select>
                            <label>Sprücheklopfer</label>
                        </div>
                    </p>
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">
                        Senden
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent, $skeletonFeatures);

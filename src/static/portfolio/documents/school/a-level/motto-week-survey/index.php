<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    last_modified(get_page_mod_time());

    $dbh = get_dbh($_ENV['PGSQL_DATABASE']);
    $stmt = $dbh->prepare('SELECT ip, monster, geschlechtertausch, ersterschultag, hippie, pyjama, bunt, vip, traumberuf, assi, diegroßen, streber, anything, derabend, mittelalter, lieblingsmannschaft, chemieunfall, lieblingstier, kindheitshelden, eskalation, gaypride FROM alevel_mottoweek WHERE ip = :ip');
    $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

    if (!$stmt->execute()) {
        throw new PDOException($stmt->errorInfo()[2]);
    }

    $rows = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rows['ip']) {
        $_GET['state'] = 'done';
    }

    $checkCount = 0;

    if ($rows) {
        foreach ($rows as $key => $value) {
            if ($key != 'ip' && $value == true) {
                ++$checkCount;
            }
        }
    }

    $skeletonDescription = 'Eine Umfrage zur Mottowoche des Abijahrgangs 2016 vom Friedrichsgymnasiums in Kassel';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = '
    <div class="row">
        <div class="col s12">
            <div class="card info">
                <div class="card-content">
                    <span class="card-title">
                        Die Umfrage ist beendet.
                    </span>
                    <p>
                        Die Funktion der Seite wird aber dennoch eingeschränkt erhalten bleiben, damit die Funktionsweise von Interessierten eingesehen werden kann.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col s12">
            <div class="card success">
                <div class="card-content">
                    <span class="card-title">Vie&shy;len Dank!</span>
                    <p>
                        Deine Antwort wurde erfasst, kann aber noch geändert werden.
                    <p>
                </div>
                <div class="card-action">
                    <a href="analysis" title="Auswertung">
                        Auswertung
                    </a>
                </div>
            </div>
        </div>
    </div>
    <p>
        Hier kannst du über die Mottos für die nächste Mottowoche abstimmen. Du hast 5 Stimmen!
    </p>
    <form action="layout/extension/save.php" method="post">
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="kindheitshelden" id="kindheitshelden"';
            if ($rows['kindheitshelden']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="kindheitshelden">Kindheitshelden, Märchen, Disney, Filme, Serien</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="monster" id="monster"';
            if ($rows['monster']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="monster">Monster, Zombie, Hexe, Horror, Halloween</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="geschlechtertausch" id="geschlechtertausch"';
            if ($rows['geschlechtertausch']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="geschlechtertausch">Geschlechtertausch</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="ersterschultag" id="ersterschultag"';
            if ($rows['ersterschultag']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="ersterschultag">Erster Schultag</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="hippie" id="hippie"';
            if ($rows['hippie']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="hippie">Hippie, 20er, 60er, XXer aus dem 20. Jahrhundert</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="pyjama" id="pyjama"';
            if ($rows['pyjama']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="pyjama">Pyjama, lässig, verschlafen</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="bunt" id="bunt"';
            if ($rows['bunt']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="bunt">Bunt, Mustermix, Bad Taste</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="vip" id="vip"';
            if ($rows['vip']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="vip">VIP, roter Teppich, Promis</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="traumberuf" id="traumberuf"';
            if ($rows['traumberuf']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="traumberuf">Traumberuf, Ich in 20 Jahren, Business</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="assi" id="assi"';
            if ($rows['assi']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="assi">Assi, Nutten & Zuhälter</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="diegroßen" id="diegroßen"';
            if ($rows['diegroßen']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="diegroßen">Die Großen der Geschichte</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="streber" id="streber"';
            if ($rows['streber']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="streber">Streber, Spießer</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="anything" id="anything"';
            if ($rows['anything']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="anything">Anything but clothes</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="derabend" id="derabend"';
            if ($rows['derabend']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="derabend">Der Abend davor vs. der Morgen danach, Hangover</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="mittelalter" id="mittelalter"';
            if ($rows['mittelalter']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="mittelalter">Mittelalter</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="lieblingsmannschaft" id="lieblingsmannschaft"';
            if ($rows['lieblingsmannschaft']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="lieblingsmannschaft">Lieblingsmannschaft, -team</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="chemieunfall" id="chemieunfall"';
            if ($rows['chemieunfall']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="chemieunfall">Chemieunfall</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="lieblingstier" id="lieblingstier"';
            if ($rows['lieblingstier']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="lieblingstier">Lieblingstier</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="eskalation" id="eskalation"';
            if ($rows['eskalation']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="eskalation">Eskalation</label>
        </p>
        <p>
            <input class="chkbx" type="checkbox" name="check_list[]" value="gaypride" id="gaypride"';
            if ($rows['gaypride']) {
                $skeletonContent .= ' checked';
            }
            $skeletonContent .= '><label for="gaypride">Gaypride</label>
        </p>
        <button class="btn waves-effect waves-light" id="subbut" name="action" type="submit">
            Senden
            <i class="material-icons right">send</i>
        </button>
    </form>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

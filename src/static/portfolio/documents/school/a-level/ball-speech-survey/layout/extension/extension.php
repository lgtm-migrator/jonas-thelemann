<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    if (isset($_POST['chosen'])) {
        $open = false;

        if ($open) {
            $dbh = getDbh($_ENV['PGSQL_DATABASE']);
            $stmt = $dbh->prepare("SELECT ip FROM alevelballspeech WHERE ip='".$_SERVER['HTTP_X_REAL_IP']."'");

            if (!$stmt->execute()) {
                throw new PDOException($stmt->errorInfo()[2]);
            }

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['chosenspeaker'] != $_POST['chosen']) {
                $dbh->exec("UPDATE alevelballspeech SET chosenspeaker='".$_POST['chosen']."' WHERE ip='".$_SERVER['HTTP_X_REAL_IP']."'");
            }

            $dbh->exec("INSERT INTO alevelballspeech(chosenspeaker, ip) VALUES ('".$_POST['chosen']."', '".$_SERVER['HTTP_X_REAL_IP']."')");

            echo 'ok;'.$_POST['chosen'];
        } else {
            echo 'closed';
        }
    }

    $finished = true;

    $dbh = getDbh($_ENV['PGSQL_DATABASE']);
    $candidateNames = array(
        'Elisabeth Schwab',
        'Jonas Thelemann',
        'Rosa Freytag',
    );

    function getPopulatedCandidateSurvey($skeletonContent)
    {
        global $finished;
        global $dbh;

        $rowForCurrentIp = getRowForCurrentIp($dbh, 'alevel-ball-speech');
        $statusHtml = '';

        if ($finished) {
            $statusHtml = getSurveyStatusHtml(array('demo', 'privacy'), true);
        }

        $alertHtml = '
        <div class="alert ';

        if (!$rowForCurrentIp && !$finished) {
            $alertHtml .= 'hidden ';
        }

        $alertHtml .= 'success" id="successpopup">
        <span>
            Vielen Dank!
        </span>
        <p>
            Deine Stimme wurde gezählt<strike>, kann aber noch von dir verändert werden</strike>.
            <br>
            Du hast für <strong id="lastchoice">';

        if ($rowForCurrentIp['chosenspeaker'] == 'candidateelisabeth') {
            $alertHtml .= 'E********';
        } elseif ($rowForCurrentIp['chosenspeaker'] == 'candidatejonas') {
            $alertHtml .= 'J****';
        } elseif ($rowForCurrentIp['chosenspeaker'] == 'candidaterosa') {
            $alertHtml .= 'R***';
        } elseif ($rowForCurrentIp['chosenspeaker'] == 'nobody') {
            $alertHtml .= 'Niemanden';
        }

        $alertHtml .= '
                </strong> gestimmt.
            </p>
        </div>
        <div class="alert hidden warning" id="warningpopup">
            <span>
                Warnung!
            </span>
            <p>
                Deine Stimme wurde <strong>noch nicht</strong> gezählt.
            </p>
            <p id="warningclick">
                Klicke auf die von dir an- oder abgewählte Person, um deine Wahl zu bestätigen.
            </p>
        </div>';

        return $alertHtml.$statusHtml.$skeletonContent;
    }

    $skeletonContent = '';

    $chosenSpeaker = null;

    // if ($rowForCurrentIp['chosenspeaker'] == 'candidateelisabeth') {
    //     $chosenSpeaker = $candidateNames[0];
    // } elseif ($rowForCurrentIp['chosenspeaker'] == 'candidatejonas') {
    //     $chosenSpeaker = $candidateNames[1];
    // } elseif ($rowForCurrentIp['chosenspeaker'] == 'candidaterosa') {
    //     $chosenSpeaker = $candidateNames[2];
    // }

    $chSpCensoredNameStar = getCensoredNameStar(getFirstName($chosenSpeaker));
    $chSpCensoredNameLine = getCensoredNameLine(getFirstName($chosenSpeaker));
    $chSpCensoredFullNameStar = getCensoredFullNameStar($chosenSpeaker);

    $skeletonContent .= '<figure id="candidate'.$chSpCensoredNameStar.'" class="draggable drag-drop">
        <img alt="'.$chSpCensoredNameLine.'" src="layout/images/'.$chSpCensoredNameLine.'.png">
        <figcaption>
            '.$chSpCensoredFullNameStar.'
        </figcaption>
    </figure>';

    // if ($rowForCurrentIp['chosenspeaker'] != 'candidateelisabeth') {
    //     $skeletonContent .= $candidateelisabeth;
    // }
    // if ($rowForCurrentIp['chosenspeaker'] != 'candidatejonas') {
    //     $skeletonContent .= $candidatejonas;
    // }
    // if ($rowForCurrentIp['chosenspeaker'] != 'candidaterosa') {
    //     $skeletonContent .= $candidaterosa;
    // }

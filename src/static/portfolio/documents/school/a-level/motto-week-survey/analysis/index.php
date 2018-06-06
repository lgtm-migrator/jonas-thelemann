<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    lastModified(getPageModTime());

    $categoriesCode = ['ip', 'monster', 'geschlechtertausch', 'ersterschultag', 'hippie', 'pyjama', 'bunt', 'vip', 'traumberuf', 'assi', 'diegroßen', 'streber', 'anything', 'derabend', 'mittelalter', 'lieblingsmannschaft', 'chemieunfall', 'lieblingstier', 'kindheitshelden', 'eskalation', 'gaypride'];
    $categories = ['ip', 'Monster, Zombie, Hexe, Horror, Halloween', 'Geschlechtertausch', 'Erster Schultag', 'Hippie, 20er, 60er, XXer aus dem 20. Jahrhundert', 'Pyjama, lässig, verschlafen', 'Bunt, Mustermix, Bad Taste', 'VIP, roter Teppich, Promis', 'Traumberuf, Ich in 20 Jahren, Business', 'Assi, Nutten & Zuhälter', 'Die Großen der Geschichte', 'Streber, Spießer', 'Anything but clothes', 'Der Abend davor vs. der Morgen danach, Hangover', 'Mittelalter', 'Lieblingsmannschaft, -team', 'Chemieunfall', 'Lieblingstier', 'Kindheitshelden', 'Eskalation', 'Gaypride'];
    // insertDbRankingsMatrixHtml('REDACTED', 'a-level-motto-week', '[{"monster":"Monster"},{"geschlechtertausch":"Geschlechtertausch"},{"ersterschultag":"Erster Schultag"}]', 'top10');

    $skeletonDescription = 'Die Auswertung der Umfrage zur Mottowoche des Abijahrgangs 2016 vom Friedrichsgymnasiums in Kassel';
    $skeletonContent = '
    <div>';

    $qString = '';

    for ($i = 1; $i < count($categoriesCode); ++$i) {
        if ($i > 1) {
            $qString .= ' UNION ';
        }

        $qString .= 'SELECT '.pg_escape_string($categoriesCode[$i]).' AS name, (SELECT count(*) FROM alevel_mottoweek WHERE '.pg_escape_string($categoriesCode[$i]).' = true) AS anzahl';
    }

    $qString .= ' ORDER BY anzahl DESC';

    $dbh = getDbh($_ENV['PGSQL_DATABASE']);
    $stmt = $dbh->prepare($qString);

    if (!$stmt->execute()) {
        throw new PDOException($stmt->errorInfo()[2]);
    }

    $result = $stmt->fetchAll();

    $qString = '';

    for ($j = 0; $j < count($result); ++$j) {
        $qString .= '
        <div>
            <div class="chip">
                '.$result[$j][1].'
            </div>
            '.$result[$j][0].'
        </div>';
    }

    for ($i = 1; $i < count($categoriesCode); ++$i) {
        $qString = str_replace($categoriesCode[$i], $categories[$i], $qString);
    }

    $skeletonContent .= $qString;
$skeletonContent .= '
</div>';

    outputHtml($skeletonDescription, $skeletonContent);

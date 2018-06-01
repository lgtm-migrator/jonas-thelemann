<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    lastModified(getPageModTime());

    $categoriesCode = ['gotteskind', 'partyraucher', 'frisur', 'mami', 'sarkasmus', 'träumer', 'shopaholik', 'markenwerbetafel', 'sextanerblase', 'auslandskorrespondent', 'dam', 'daw', 'seeles', 'hobbypsychologe', 'sanitäter', 'schauspieler', 'handysuchti', 'vielfraß', 'ehepaar', 'weltenbummler', 'starfotograf', 'stock', 'wutbürger', 'backmeister', 'ordnungsamt', 'chemiker', 'diskussion', 'quasselstrippe', 'hausaufgabe', 'öko', 'revoluzzer', 'sauklaue', 'girl', 'vorgelernt', 'entscheidungsunfähig', 'prinzessin', 'sprachtalent', 'gemein', 'genie', 'punktefeilscher', 'anti', 'männerschwarm', 'frauenheld', 'festivalgänger', 'altphilologe', 'rock', 'klausurnachbar', 'naturbursche', 'riese', 'drecksack', 'organisationsdesaster', 'junggeselle', 'schlaftablette', 'feministin', 'notenwürfler', 'punktelieferant', 'ähm', 'pause', 'seelel', 'unterricht', 'eingebildet', 'spät', 'unbekannt', 'schülerliebling', 'miesepeter', 'moralapostel', 'verplant', 'dressed', 'kopierkönig', 'grinsekatze', 'tafelbild', 'gartenzwerg', 'übermotiviert', 'sprücheklopfer', 'ip'];
    $categories = ['Got&shy;tes&shy;kind', 'Par&shy;ty&shy;rau&shy;cher', '„Die Fri&shy;sur“', 'Ma&shy;mi', 'Mr./ Mrs. Sar&shy;kas&shy;mus', 'Träu&shy;mer', 'Shop&shy;a&shy;ho&shy;lik', 'Mar&shy;ken&shy;wer&shy;be&shy;ta&shy;fel', 'Sex&shy;ta&shy;ner&shy;bla&shy;se', 'Aus&shy;lands&shy;kor&shy;res&shy;pon&shy;dent', 'Dat Ass Männ&shy;lich', 'Dat Ass Weib&shy;lich', 'Gu&shy;te See&shy;le', 'Hob&shy;by&shy;psy&shy;cho&shy;lo&shy;ge', 'Sa&shy;ni&shy;tä&shy;ter', 'Schau&shy;spie&shy;ler', 'Han&shy;dy&shy;such&shy;ti', 'Viel&shy;fraß', 'Al&shy;tes E&shy;he&shy;paar', 'Wel&shy;ten&shy;bum&shy;mler', 'Star&shy;fo&shy;to&shy;graf', 'Stock im Arsch', 'Wut&shy;bür&shy;ger', 'Back&shy;mei&shy;ster/in', 'Ord&shy;nungs&shy;amt', 'Che&shy;mi&shy;ker', 'E&shy;wi&shy;ge Dis&shy;kus&shy;sion', 'Quas&shy;sel&shy;strip&shy;pe', '„Wir hat&shy;ten et&shy;was auf?!“', 'Ö&shy;ko', 'Re&shy;vo&shy;luz&shy;zer', 'Sau&shy;klau&shy;e', 'Swee&shy;tes Girl', 'Vor&shy;ge&shy;lernt', 'Ent&shy;schei&shy;dungs&shy;un&shy;fä&shy;hig', 'Dis&shy;ney-Prin&shy;zes&shy;sin', 'Sprach&shy;ta&shy;lent', 'klein, a&shy;ber ge&shy;mein', 'ver&shy;kan&shy;ntes Ge&shy;nie', 'Punk&shy;te&shy;feil&shy;scher', 'An&shy;ti Al&shy;les', 'Män&shy;ner&shy;schwarm', 'Frau&shy;en&shy;held', 'Fes&shy;ti&shy;val&shy;gän&shy;ger', 'Alt&shy;phi&shy;lo&shy;lo&shy;ge', 'Rock\'n Roll', 'Bes&shy;ter Klau&shy;sur&shy;nach&shy;bar', 'Na&shy;tur&shy;bur&shy;sche', 'Rie&shy;se', 'Dreck&shy;sack', 'Or&shy;ga&shy;ni&shy;sa&shy;tions&shy;de&shy;sas&shy;ter', 'E&shy;wi&shy;ger Jung&shy;ge&shy;sel&shy;le', 'Schlaf&shy;ta&shy;blet&shy;te', 'Fe&shy;mi&shy;nis&shy;tin', 'No&shy;ten&shy;würf&shy;ler', 'Punk&shy;te&shy;lie&shy;fe&shy;rant', '„Erst re&shy;den, dann... ähm...“', '„Gibt kei&shy;ne Pau&shy;se!“', 'Gu&shy;te See&shy;le', 'Al&shy;les au&shy;ßer Un&shy;ter&shy;richt', 'Ein&shy;ge&shy;bil&shy;det', '„Tut mir ja leid, dass ich zu spät bin, a&shy;ber ...“', 'Kenn ich nicht', 'Schü&shy;ler&shy;lieb&shy;ling', 'Mie&shy;se&shy;pe&shy;ter', 'Mo&shy;ral&shy;a&shy;pos&shy;tel', 'Ver&shy;plant', 'Best Dressed', 'Ko&shy;pier&shy;kö&shy;nig', 'Grin&shy;se&shy;kat&shy;ze', 'Das Ta&shy;fel&shy;bild', 'Gar&shy;ten&shy;zwerg', 'Ü&shy;ber&shy;mo&shy;ti&shy;viert', 'Sprü&shy;che&shy;klop&shy;fer'];

    function getAnonymizedNames($names)
    {
        return preg_replace('/und|(\\B\\p{L})/Uu', '*', preg_replace('/und/Uu', '&', $names));
    }

    $dbh = getDbh($_ENV['PGSQL_DATABASE']);

    $skeletonDescription = 'Auswertung der Umfrage über Schüler- und Lehrerawards für die Abizeitung des Friedrichsgymnasiums in Kassel 2016';
    $skeletonFeatures = ['lcl/ext/css', 'lcl/ext/js'];
    $skeletonContent = '
    <div class="row">
        <div id="student" class="col s12 l6">
            <h1>
                Schü&shy;ler&shy;a&shy;wards
            </h1>';

    for ($i = 0; $i < count($categoriesCode); ++$i) {
        if ($i < 49) {
            $stmt = $dbh->prepare('SELECT '.$categoriesCode[$i].', count(*) anzahl FROM (SELECT DISTINCT * FROM "alevel-magazine-awards") t WHERE '.$categoriesCode[$i]." <> '' GROUP BY ".$categoriesCode[$i].' ORDER BY anzahl DESC');
            $stmt->execute();
            $result = $stmt->fetchAll();

            $skeletonContent .= '
            <h2>
                '.$categories[$i].'
            </h2>';

            for ($j = 0; $j < count($result); ++$j) {
                if ($result[$j][0] != ' und ') {
                    $skeletonContent .= '
                    <div>
                        <div class="chip">
                            '.$result[$j][1].'
                        </div>
                        '.getAnonymizedNames($result[$j][0]).'
                    </div>';
                }
            }
        }
    }

    $skeletonContent .= '
    </div>
    <div id="teacher" class="col s12 l6">
        <h1>
            Leh&shy;rer&shy;a&shy;wards
        </h1>';

    for ($i = 0; $i < count($categoriesCode); ++$i) {
        if ($i > 48 && $i < 74) {
            $stmt = $dbh->prepare('SELECT '.$categoriesCode[$i].', count(*) anzahl FROM (SELECT DISTINCT * FROM "alevel-magazine-awards") t WHERE '.$categoriesCode[$i]." <> '' GROUP BY ".$categoriesCode[$i].' ORDER BY anzahl DESC');
            $stmt->execute();
            $result = $stmt->fetchAll();

            $skeletonContent .= '
            <h2>
                '.$categories[$i].'
            </h2>';

            for ($j = 0; $j < count($result); ++$j) {
                $skeletonContent .= '
                <div>
                    <div class="chip">
                        '.$result[$j][1].'
                    </div>
                    '.getAnonymizedNames($result[$j][0]).'
                </div>';
            }
        }
    }

    $skeletonContent .= '
        </div>
    </div>';

    outputHtml($skeletonDescription, $skeletonContent, $skeletonFeatures);

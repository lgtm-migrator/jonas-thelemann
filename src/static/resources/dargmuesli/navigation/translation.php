<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';

    $navigationTranslations = array(
        'a-level' => 'A&shy;bi&shy;tur',
        'apache' => 'A&shy;pa&shy;che',
        'attacks' => 'An&shy;grif&shy;fe',
        'graduation-prank' => 'A&shy;bi&shy;streich',
        'graduation-prank-2016' => 'A&shy;bi&shy;streich 2016',
        'analog' => 'A&shy;na&shy;log',
        'analysis' => 'Aus&shy;wer&shy;tung',
        'art' => 'Kunst',
        'authorization' => 'Be&shy;rech&shy;ti&shy;gun&shy;gen',
        'awards-survey' => 'Schü&shy;ler- & Leh&shy;rer&shy;a&shy;wards',
        'ball-speech-survey' => 'Ball&shy;re&shy;de',
        'bash' => 'Bash',
        'batch-rename' => 'Batch&shy;Re&shy;name',
        'blender' => 'Blen&shy;der',
        'bottom-news' => 'Bot&shy;Tom News',
        'chip-download-change' => 'Chip Down&shy;load Wech&shy;sel',
        'code-conventions' => 'Pro&shy;gram&shy;mier&shy;stil',
        'community' => 'Com&shy;mu&shy;ni&shy;ty',
        'cover-extract' => 'CoverExtract',
        'c-sharp' => 'C#',
        'deutsch-info' => 'deutsch.in&shy;fo',
        'digital' => 'Di&shy;gi&shy;tal',
        'djing' => 'DJ&shy;en',
        'documentation' => 'Do&shy;ku&shy;men&shy;ta&shy;tion',
        'documents' => 'Do&shy;ku&shy;men&shy;te',
        'error' => 'Feh&shy;ler',
        'faq' => 'FAQ',
        'fg-app' => 'FG-App',
        'formatting' => 'For&shy;ma&shy;tie&shy;rung',
        'german' => 'Deutsch',
        'git-faq' => 'Git-FAQ',
        'github' => 'Git&shy;Hub',
        'goodbye' => 'Auf Wie&shy;der&shy;se&shy;hen',
        'graphic' => 'Gra&shy;fik',
        'greenfoot' => 'Green&shy;foot',
        'hardware' => 'Hard&shy;ware',
        'hcj-website-builder' => 'HCJ-Web&shy;site-Buil&shy;der',
        'html' => 'HTML',
        'imprint' => 'Im&shy;pres&shy;sum',
        'java' => 'Ja&shy;va',
        'javascript' => 'Ja&shy;va&shy;Script',
        'learning-sequence' => 'Lern&shy;rei&shy;hen&shy;fol&shy;ge',
        'linux' => 'Li&shy;nux',
        'maths' => 'Ma&shy;the&shy;ma&shy;tik',
        'maze-generator' => 'Maze-Ge&shy;ne&shy;ra&shy;tor',
        'monty-hall-problem' => 'Das Zie&shy;gen&shy;pro&shy;blem',
        'motto-week-survey' => 'Mot&shy;to&shy;wo&shy;che',
        'mumble' => 'Mum&shy;ble',
        'music' => 'Mu&shy;sik',
        'prank' => 'Streich',
        'programming' => 'Pro&shy;gram&shy;mie&shy;rung',
        'prom' => 'A&shy;bi&shy;ball',
        'prom-card' => 'A&shy;bi&shy;ball Ein&shy;tritts&shy;kar&shy;te',
        'python' => 'Py&shy;thon',
        'religion' => 'Re&shy;li&shy;gion',
        'school' => 'Schu&shy;le',
        'security' => 'Si&shy;cher&shy;heit',
        'sitemap' => 'Site&shy;map',
        'spotify-ti' => 'Spo&shy;ti&shy;fy&shy;TI',
        'song-suggestions' => 'Song-Vor&shy;schlä&shy;ge',
        'this-website' => 'Die&shy;se Web&shy;site',
        'troll-em' => 'Troll\'&shy;em',
        'unity' => 'U&shy;ni&shy;ty',
        'up' => 'Hoch',
        'visual-basic' => 'Vi&shy;su&shy;al Ba&shy;sic',
        'web-console' => 'Web-Kon&shy;so&shy;le',
        'web-scripts' => 'Web&shy;scripts',
        'welcome' => 'Will&shy;kom&shy;men',
        'workflow' => 'Ar&shy;beits&shy;ab&shy;lauf',
        'x-monkey' => 'X&shy;Mon&shy;key',
        'youtube-calendar' => 'You&shy;Tube-Ad&shy;vents&shy;ka&shy;len&shy;der',
        'zoner-photo-studio' => 'Zo&shy;ner Pho&shy;to Stu&shy;dio'
    );

    function getNavigationTranslation($word, $isShy = false, $isCode = false)
    {
        global $navigationTranslations;

        $navigationTranslation = '';

        if (array_key_exists($word, $navigationTranslations)) {
            $navigationTranslation = $navigationTranslations[$word];
        } else {
            if (!$isCode || $word == '') {
                $navigationTranslation = '?';
            } else {
                $navigationTranslation = microtime();
            }
        }

        if (!$isShy) {
            $navigationTranslation = str_replace('&shy;', '', $navigationTranslation);
        }

        return $navigationTranslation;
    }

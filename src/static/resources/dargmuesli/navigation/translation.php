<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';

    $navigationTranslations = array(
        'a-level' => 'Abitur',
        'apache' => 'Apache',
        'attacks' => 'Angriffe',
        'graduation-prank' => 'Abistreich',
        'graduation-prank-2016' => 'Abistreich 2016',
        'analog' => 'Analog',
        'analysis' => 'Auswertung',
        'art' => 'Kunst',
        'authorization' => 'Berechtigungen',
        'awards-survey' => 'Schüler- & Lehrerawards',
        'ball-speech-survey' => 'Ballrede',
        'bash' => 'Bash',
        'batch-rename' => 'BatchRename',
        'blender' => 'Blender',
        'bottom-news' => 'BotTom News',
        'chip-download-change' => 'Chip Download Wechsel',
        'code-conventions' => 'Programmierstil',
        'community' => 'Community',
        'cover-extract' => 'CoverExtract',
        'c-sharp' => 'C#',
        'deutsch-info' => 'deutsch.info',
        'digital' => 'Digital',
        'djing' => 'DJen',
        'documentation' => 'Dokumentation',
        'documents' => 'Dokumente',
        'error' => 'Fehler',
        'faq' => 'FAQ',
        'fg-app' => 'FG-App',
        'formatting' => 'Formatierung',
        'german' => 'Deutsch',
        'git-faq' => 'Git-FAQ',
        'github' => 'GitHub',
        'goodbye' => 'Auf Wiedersehen',
        'graphic' => 'Grafik',
        'greenfoot' => 'Greenfoot',
        'hardware' => 'Hardware',
        'hcj-website-builder' => 'HCJ-Website-Builder',
        'html' => 'HTML',
        'imprint' => 'Impressum',
        'java' => 'Java',
        'javascript' => 'JavaScript',
        'learning-sequence' => 'Lernreihenfolge',
        'linux' => 'Linux',
        'maths' => 'Mathematik',
        'maze-generator' => 'Maze-Generator',
        'monty-hall-problem' => 'Das Ziegenproblem',
        'motto-week-survey' => 'Mottowoche',
        'mumble' => 'Mumble',
        'music' => 'Musik',
        'prank' => 'Streich',
        'programming' => 'Programmierung',
        'prom' => 'Abiball',
        'prom-card' => 'Abiball Eintrittskarte',
        'python' => 'Python',
        'religion' => 'Religion',
        'school' => 'Schule',
        'security' => 'Sicherheit',
        'sitemap' => 'Sitemap',
        'spotify-ti' => 'SpotifyTI',
        'song-suggestions' => 'Song-Vorschläge',
        'this-website' => 'Diese Website',
        'troll-em' => 'Troll\'em',
        'unity' => 'Unity',
        'up' => 'Hoch',
        'visual-basic' => 'Visual Basic',
        'web-console' => 'Web-Konsole',
        'web-scripts' => 'Webscripts',
        'welcome' => 'Willkommen',
        'workflow' => 'Arbeitsablauf',
        'x-monkey' => 'XMonkey',
        'youtube-calendar' => 'YouTube-Adventskalender',
        'zoner-photo-studio' => 'Zoner Photo Studio'
    );

    function getNavigationTranslation($word, $isShy = false, $isCode = false)
    {
        global $navigationTranslations;

        $syllable = new Syllable('de-1996');
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

        if ($isShy) {
            $navigationTranslation = $syllable->hyphenateText($navigationTranslation);
        }

        return $navigationTranslation;
    }

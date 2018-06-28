<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Ein kurzer Lebenslauf';
    $skeletonContent = '
    <section id="portfolio" class="section scrollspy">
        <p>
            Mit dem Programmieren habe ich im Sommer 2013 angefangen, bevor ich in der Schule das erste Mal Informatikunterricht hatte, weil ich es nicht abwarten konnte, zu wissen, wie man ein Programm schreibt.
            Die ersten Schritte wagte ich mit Visual Basic, weil man dort Programmoberflächen sehr komfortabel erstellen kann und ich mich mehr auf die Funktionalität der ersten Programme konzentrieren konnte.
            Darauf folgten im Informatikunterricht an meiner Schule im Jahr 2014 erste Erfahrungen im Bereich Webprogrammierung und mit Java.
        </p>
        <p>
            Schon bald entdeckte ich die weite Welt der Open Source und schrieb 2015 einige Userscripts und eine komplette zweite Website für einen größeren YouTuber.
            Während ich mich auf Fehlersuche in bereits existierenden GitHub-Repositories befand, versuchte ich mich auch im lokalen GIT in den verschiedensten Branches zurechtzufinden.
            Ich traf auf die Spotify Web API für Java, dessen Maintainer ich ein Jahr später werden sollte.
            Vorher jedoch schrieb ich einen WhatsApp-Newsbot in Python und arbeitete als Bundesfreiwilligendiensler an zwei Datenbanken beim Landkreis Kassel.
        </p>
        <p>
            An der Universität lernte ich die Programmiersprache C und auch einiges in den Bereichen Elektro- und Digitaltechnik, sowie der theoretischen Informatik.
        </p>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent);

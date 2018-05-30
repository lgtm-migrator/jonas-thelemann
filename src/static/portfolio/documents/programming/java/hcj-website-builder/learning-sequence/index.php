<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Ein Vorschlag für die Reihenfolge der Einarbeitung in wichtige Themen von Java';
    $skeletonFeatures = ['lcl/ext/css'];
    $skeletonContent = '
    <p>
        Autor: Lukas Mentel
    </p>
    <p>
        Ich habe den Eindruck, dass manche von euch Schwierigkeiten haben, für sie wesentliche Dinge der Sprache Java zu erkennen und diese zu behalten. Dies ist nur allzu verständlich, da Ihr gar nicht genau wisst, was Ihr programmieren werdet und welche Bestandteile Ihr dazu benötigt.
        <br>
        Ich möchte euch mit dieser Datei zeigen, was Ihr vermutlich für eure Arbeit benötigt. Dazu verwende ich drei Farben, die die Wichtigkeit der einzelnen Punkte darstellen:
        <br>
    </p>
    <ul>
        <li>
            Grün bedeutet: Dies solltet Ihr euch anschauen, wenn Ihr mal darauf stoßt.
        </li>
        <li>
            Gelb bedeutet: Dies solltet Ihr euch erarbeiten, wenn Ihr programmiert.
        </li>
        <li>
            Rot bedeutet: Dies solltet Ihr euch ansehen, bevor Ihr mit dem Programmieren beginnt
        </li>
    </ul>
    <table>
        <tbody>
            <tr class="important">
                <td>
                    Grundlagen von Java: Datentypen und deren Wrapper-Klassen
                </td>
            </tr>
            <tr class="important">
                <td>
                    Grundlagen von Java: Verweistypen
                </td>
            </tr>
            <tr class="important">
                <td>
                    Grundlagen von Java: Operatoren
                </td>
            </tr>
            <tr class="important">
                <td>
                    Grundlagen von Java: Anweisungen, Kontrollstrukturen
                </td>
            </tr>
            <tr class="important">
                <td>
                    Objektorientierung: Objekte, Klassen, Datenelemente, Aufforderungen
                </td>
            </tr>
            <tr class="important">
                <td>
                    Objektorientierung: Kapselung
                </td>
            </tr>
            <tr class="important">
                <td>
                    Objektorientierung: Konstruktoren, Garbage Collection
                </td>
            </tr>
            <tr class="important">
                <td>
                    Datenstrukturen: Java Collections Framework (v. a. Vector&lt;&gt;)
                </td>
            </tr>
            <tr class="important">
                <td>
                    Programmstrukturierung: Packages
                </td>
            </tr>
            <tr class="important">
                <td>
                    Exceptions werfen und abfangen
                </td>
            </tr>
            <tr class="useful">
                <td>
                    Objektorientierung: Vererbung
                </td>
            </tr>
            <tr class="useful">
                <td>
                    Listener-Konzept
                </td>
            </tr>
            <tr class="if-necessary">
                <td>
                    Objektorientierung: Interfaces
                </td>
            </tr>
            <tr class="if-necessary">
                <td>
                    Generics
                </td>
            </tr>
            <tr class="if-necessary">
                <td>
                    (Datei-)Streams
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        Als Referenz für eure Programmierarbeit solltet Ihr die <a href="https://docs.oracle.com/javase/8/docs/api/"> Java SE 8 API </a> verwenden.
    </p>
    <p>
        Zur Arbeitsorganisation: Ich werde, wie schon durch die Teams festgelegt, die GUI erstellen. Zusätzlich werde ich die Datenelemente der Modelle eintragen. Alle Dinge dazwischen sind euch überlassen. Hierzu zählen:
    </p>
    <ol>
        <li>
            Das Befüllen der Modelle mit bzw. Speichern von Daten (im model-package). Dazu gibt es Loader, Saver und Manager für die Ressourcen mit denen wir arbeiten.
        </li>
        <li>
            Das Weitergeben der Daten an die Grafik.
        </li>
        <li>
            Das Entgegennehmen von grafischen Ereignissen und das Verarbeiten derselben.
        </li>
        <li>
            Das Aktualisieren der Daten in den Modellen.
        </li>
        <li>
            Die Generierung des Zielsprachencodes.
        </li>
    </ol>
    Wenn nicht anders angegeben, gehören die Aufgaben ins presenter-Package. Dies wird das Package sein, in dem Ihr hauptsächlich arbeitet. Ein kleinerer Teil eurer Arbeit findet im model-Package statt.';

    outputHtml($skeletonDescription, $skeletonContent, $skeletonFeatures);

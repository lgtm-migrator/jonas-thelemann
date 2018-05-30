<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Die Codeconventions des HCJ-Website-Builders für gut verständlichen und einheitlichen Code';
    $skeletonContent = '
    <h4>
        Ver&shy;sion 0.3.0
    </h4>
    Vgl. <a href="https://github.com/FG-Team/HCJ-Website-Builder/wiki/Code-Conventions" title="Die Code Conventions des FG-Teams auf Github">Github</a>.
    <section id="vorwort" class="section scrollspy">
        <h2>
            §1 Vor&shy;wort
        </h2>
        Diese Code Conventions sind Grundlage aller im FG-Team entstehenden Codeteile der Programmiersprache Java.
        Sie sollen dem Code eine feste Struktur geben und so dessen Qualität sichern.
        Alle Entwickler des FG-Teams verpflichten sich mit dem Beitritt dazu, ihre Codeteile nach bestem Wissen an dieser Konvention auszurichten.
        Des Weiteren verpflichten sie sich, bei der Suche nach Unstimmigkeiten im Bezug auf Regeln der verwendeten Programmiersprache und dieser Konvention den zu prüfenden Codeteil genauestens unter die Lupe zu nehmen.
        Sollten Sie in diesen Konventionen fehlende Erläuterungen zu bestimmten Situationen oder Fehler/Widersprüchlichkeiten finden, so melden Sie dies über die bekannten Kommunikationswege, damit alle Beteiligten hierzu einen Nachtrag in diese Konventionen einbringen können.
    </section>
    <section id="generellebemerkungen" class="section scrollspy">
        <h2>
            §2 Ge&shy;ne&shy;rel&shy;le Be&shy;mer&shy;kun&shy;gen
        </h2>
        In diesem Abschnitt folgen generelle Bemerkungen, die für alle Codeebenen (Klassen/Interfaces, Methoden, Attribute und/oder Anweisungen) gelten.
        <ol>
            <li>
                Es sind eindeutige, englischsprachige Bezeichner zu verwenden, sodass deren Bedeutung sich (zumindest grob) herleiten lässt.
            </li>
            <li>
                Abkürzungen sind zu vermeiden.
                <ol>
                    <li>
                        Zulässige Abkürzungen sind Buchstaben als Schleifenvariablen.
                    </li>
                    <li>
                        Eine zulässige Abkürzung ist auch <code>cls</code> als Bezeichner eines Class-Objektes, da <code>class</code> ein Schlüsselwort ist.
                    </li>
                </ol>
            </li>
            <li>
                Javadoc-Kommentare enthalten alle zutreffenden Schlüsselwörter. D. h., dass alle Schlüsselwörter, die auf einen Bestandteil zu beziehen sind, in dessen Dokumentation aufgeführt werden.
            </li>
            <li>
                Die erste Zeile eines Javadoc-Kommentars (beginnend mit <code>/**</code>) beinhaltet eine Kurzbeschreibung des jeweiligen Bestandteils, die mit einem Punkt abgeschlossen wird.
            </li>
            <li>
                Ein Javadoc-Kommentar enthält keine Leerzeilen.
            </li>
            <li>
                Das Kommentarende <code>*/</code> steht in einer separaten Zeile ohne sonstigen Inhalt.
            </li>
            <li>
                Alle zutreffenden Annotations müssen angegeben werden, insbesondere <code>@Override</code>.
            </li>
            <li>
                Keine Codezeile darf länger als 80 Zeichen sein.
            </li>
            <li>
                Eine Einrückung entspricht vier einzelnen Leerzeichen.
                <ol>
                    <li>
                        Sollte damit eine Einrückung zu der gewollten Position nicht möglich sein, so muss bis zum ersten Einrückpunkt hinter dieser Position eingerückt werden. Keinesfalls dürfen ein bis drei Leerzeichen eingesetzt werden, um Teile exakt untereinander zu bringen.
                    </li>
                </ol>
            </li>
            <li>
                Der erstellte Code darf weder zu Fehlermeldungen noch zu Warnungen des Compilers führen.
                <ol>
                    <li>
                        Das Unterdrücken von Fehlern und Warnungen (vor allem die Verwendung der Annotation <code>@SuppressWarnings</code>) ist begründet zu dokumentieren.
                    </li>
                </ol>
            </li>
            <li>
                Geschweifte Klammern stehen stets in einer eigenen Zeile. Ggf. dürfen Zeilenkommentare (jedoch keine Blockkommentare!) folgen.
            </li>
            <li>
                Ein Block (i. d. R. begrenzt durch geschweifte Klammern <code>{}</code>) ist stets einmal mehr eingerückt als der ihm übergeordnete Block.
            </li>
            <li>
                Grunddatentypen dürfen nicht verwendet werden. Stattdessen stehen für die Speicherung von Werten Objekte der Wrapper-Klassen zur Verfügung.
            </li>
        </ol>
    </section>
    <section id="klassenundinterfaces" class="section scrollspy">
        <h2>
            §3 Klas&shy;sen und In&shy;ter&shy;fa&shy;ces
        </h2>
        <ol>
            <li>
                Klassen- und Interfacenamen beginnen stets mit <code>FG</code> (in dieser Schreibweise).
            </li>
            <li>
                Über jeder Klasse und jedem Interface steht ein Javadoc-Kommentar.
            </li>
            <li>
                Dieser Javadoc-Kommentar enthält die Namen sämtlicher Autoren, die zu dieser Klasse maßgeblich beigetragen haben.
            </li>
            <li>
                Eine Klassendeklaration hat die Form <code>class X&lt;T&gt; extends Y&lt;U&gt; implements Z, ZZ</code>.
            </li>
            <li>
                Ein Zeilenumbruch ist an folgenden Stellen erlaubt, wobei die kleinste Zahl zur größten Priorität gehört:
                <ol>
                    <li>
                        Kein Umbruch.
                    </li>
                    <li>
                        Nach der <code>extends</code> Klausel.
                    </li>
                    <li>
                        Sowohl nach der <code>class</code>, als auch nach der <code>extends</code> Klausel.
                    </li>
                </ol>
            </li>
            <li>
                Die Klassenbestandteile sind in folgender Reihenfolge anzuordnen:
                <ol>
                    <li>
                        Statische Attribute
                    </li>
                    <li>
                        Instanzattribute
                    </li>
                    <li>
                        Statische Konstruktoren
                    </li>
                    <li>
                        Instanzkonstruktoren
                    </li>
                    <li>
                        Statische Methoden
                    </li>
                    <li>
                        Instanzmethode
                    </li>
                </ol>
            </li>
            <li>
                Die Elemente sollten nach Inhalt sortiert werden.
                Dies dient allerdings nur der Übersichtlichkeit und erfolgt nach weniger strengen Regeln.
                <br>
                Die Grundprinzipien sind:
                <ol>
                    <li>
                        Die Elemente werden nach dem (voraussichtlichen) Verwendungszeitpunkt sortiert.
                    </li>
                    <li>
                        Methoden, die an einem gemeinsamen Attribut arbeiten (z. B. getter und setter), stehen zusammmen.
                    </li>
                    <li>
                        Methoden mit gleicher Bezeichnung werden nach Anzahl und Typ der Parameter sortiert.
                    </li>
                </ol>
            <li>
                Die <code>serialVersionUID</code> einer Klasse, soweit notwendig, ist bei einer Änderung, die die Klasse inkompatibel zu vorherigen Versionen macht, wie folgt mit dem aktuellen Zeitpunkt zu kennzeichnen: <code>private final static long serialVersionUID = TTMMJJJJHHMinMinSS</code> (02.01.2014 15:00:30 -> 02012014150030).
            </li>
        </ol>
    </section>
    <section id="attribute" class="section scrollspy">
        <h2>
            §4 At&shy;tri&shy;bu&shy;te
        </h2>
        <ol>
            <li>
                Der Wert öffentlicher Konstanten muss dokumentiert werden.
            </li>
            <li>
                Attribute eines Interfaces sind als <code>final static</code> zu kennzeichnen, obgleich sie diese Eigenschaften durch das Interface verliehen bekommen.
            </li>
        </ol>
    </section>
    <section id="methoden" class="section scrollspy">
        <h2>
            §5 Me&shy;tho&shy;den
        </h2>
        <ol>
            <li>
                Über jeder Methode steht ein Javadoc-Kommentar.
            </li>
            <li>
                Annotations zu einer Methode stehen in der Zeile direkt über der Methode.
            </li>
            <li>
                Eine Methodendeklaration hat die Form <code>&lt;T&gt; public int getCount(T object) throws Exception1</code>.
            <li>
                Ein Zeilenumbruch ist an folgenden Stellen erlaubt, wobei die kleinste Nummer zur größten Priorität gehört:
            <ol>
                <li>
                    Kein Umbruch.
                </li>
                <li>
                    Nach dem Klammerpaar <code>()</code>.
                </li>
                <li>
                    Nach dem Methodenbezeichner (hier: <code>getCount</code>), also vor dem Klammerpaar <code>()</code>;
                </li>
                <li>
                    Nach der öffnenden Klammer <code>(</code> sowie nach jedem Parameter.
                    Die schließende Klammer <code>)</code> steht dann hinter dem letzten Parameter.
                </li>
            </ol>
            <li>
                Das Klammerpaar <code>()</code> steht ohne Leerzeichen direkt hinter dem Methodenbezeichner.
            </li>
            <li>
                Eine als <code>@deprecated</code> markierte Methode darf nicht aufgerufen werden.
            </li>
            <li>
                Methoden eines Interfaces sind als <code>abstract</code> zu kennzeichnen, obgleich sie diese Eigenschaften durch das Interface verliehen bekommen.
            </li>
            <li>
                Eine Methode besitzt genau eine <code>return</code> Anweisung.
            </li>
            <li>
                Es darf beliebig viele <code>throw</code> Anweisungen geben.
            </li>
            <li>
                Jede Methode führt die Klassen aller Exceptions, die sie werfen kann, in ihrer <code>throws</code> Klausel auf (auch <code>RuntimeException</code> + Unterklassen).
            </li>
        </ol>
    </section>
    <section id="anweisungen" class="section scrollspy">
        <h2>
            §6 An&shy;wei&shy;sun&shy;gen
        </h2>
        <ol>
            <li>
                Bei Bezug auf Klassenelemente in Anweisungen müssen die Zeiger <code>this</code> und <code>super</code> dem Elementbezeichner vorangestellt werden.
            </li>
            <li>
                Switch-Anweisung:
                <ol>
                    <li>
                        Der Bereich zwischen zwei <code>case</code> Anweisungen zählt als Block und wird entsprechend behandelt.
                    </li>
                    <li>
                        Sollten hinter allen <code>case</code> Anweisungen eines switch-Blockes nur eine Codezeile (inklusive <code>break</code>) folgen, so dürfen die Anweisungen hinter das <code>case</code> notiert werden.
                    </li>
                    <li>
                        Vor und nach dem Doppelpunkt der case-Anweisung befindet sich jeweils ein Leerzeichen.
                    </li>
                    <li>
                        Wenn ein case-Block nicht mit einem break endet, so ist dies mit dem Zeilenkommentar <code>//continue with next case</code> kenntlich zu machen.
                    </li>
                </ol>
            </li>
            <li>
                If-else-Anweisung:
                <ol>
                    <li>
                        Jedes <code>else [if]</code> in neue Zeile, nicht hinter schließende Klammer des letzten Blocks
                    </li>
                </ol>
            </li>
            <li>
                Kurzformoperator Prüfungsausdruck ? WertWennWahr : WertWennFalsch
                <ol>
                    <li>
                        Dieser Operator darf nicht verwendet werden, da er schwierig zu lesen ist.
                    </li>
                </ol>
            </li>
        </ol>
    </section>
    <section id="anhang" class="section scrollspy">
        <h2>
            §7 An&shy;hang
        </h2>
        <h3>
            Anmerkungen (Fußnoten)
        </h3>
        <ol>
            <li>
                Die Formdefinitionen enthalten bewusst Generics, um deren Stellung zu definieren. Diese können in vielen Fällen ignoriert werden.
            </li>
            <li>
                Diese Methode bleibt allerdings im Quelltext stehen, damit Abwärtskompatibilität zu vor der Kennzeichnung geschriebenen Codeteilen besteht. Ist dies nicht gewünscht, so müssen vor der Löschung alle Codeteile, die diese Methode aufrufen, umgeschrieben werden.
            </li>
        </ol>
        <h3>
            Kurz&shy;fas&shy;sung der Code Con&shy;ven&shy;tions
        </h3>
        <ol>
            <li>
                Generell
                <ol>
                    <li>
                        Sinnvolle Bezeichner ohne Abkürzungen
                    </li>
                    <li>
                        Vollständige Javadoc-Kommentare
                    </li>
                    <li>
                        Annotations angeben
                    </li>
                    <li>
                        Zeilenlänge &lt;= 80 Zeichen
                    </li>
                    <li>
                        Einrückung = 4 Zeichen
                    </li>
                    <li>
                        Keine Fehlermeldungen und Warnungen
                    </li>
                    <li>
                        Eigene Zeile für <code>{</code> und <code>}</code>
                    </li>
                    <li>
                        Keine primitiven Datentypen
                    </li>
                    <li>
                        Blockeinrückung
                    </li>
                </ol>
            </li>
            <li>
                Klassen/Interfaces
                <ol>
                    <li>
                        Präfix <code>FG</code>
                    </li>
                    <li>
                        Javadoc
                    </li>
                    <li>
                        Elemente sortieren
                    </li>
                </ol>
            </li>
            <li>
                Methoden
                <ol>
                    <li>
                        Javadoc
                    </li>
                    <li>
                        Annotations
                    </li>
                    <li>
                        Keine <code>deprecated</code>-Methoden aufrufen
                    </li>
                    <li>
                        Im Interface: <code>abstract</code>
                    </li>
                    <li>
                        return-Anweisungen
                    </li>
                </ol>
            </li>
            <li>
                Attribute
                <ol>
                    <li>
                        Öffentliche Konstanten dokumentieren
                    </li>
                    <li>
                        Im Interface: <code>final static</code>
                    </li>
                </ol>
            </li>
            <li>
                Anweisungen
                <ol>
                    <li>
                        Zeiger <code>this</code>, <code>super</code>
                    </li>
                    <li>
                        switch: <code>case</code> ist Block; Fortsetzung im nächsten case-Block dokumentieren
                    </li>
                    <li>
                        if-else: jedes <code>else [if]</code> in neue Zeile
                    </li>
                    <li>
                        Kurzformoperator <code>...?...:...</code> nicht verwenden
                    </li>
                </ol>
            </li>
        </ol>
        <h3>
            Change&shy;log
        </h3>
        <table>
            <tr>
                <th>
                    Versionsnummer
                </th>
                <th>
                    Änderungen
                </th>
            </tr>
            <tr>
                <td>
                    0.1.0
                </td>
                <td>
                    Erste Version.
                </td>
            </tr>
            <tr>
                <td>
                    0.1.1
                </td>
                <td>
                    §1 Abs. 1 geändert (Programmiersprache Java), §3 Abs. 2a eingefügt.
                </td>
            </tr>
            <tr>
                <td>
                    0.1.2
                </td>
                <td>
                    §5 Abs. 8 geändert.
                </td>
            </tr>
            <tr>
                <td>
                    0.2.0
                </td>
                <td>
                    Viele Details geändert, in HTML umgewandelt.
                </td>
            </tr>
            <tr>
                <td>
                    0.2.5
                </td>
                <td>
                    In Layout der Webite jonas-thelemann.de gebracht.
                </td>
            </tr>
            <tr>
                <td>
                    0.3.0
                </td>
                <td>
                    Rechtschreibfehler korrigiert, Layout weiter optimiert.
                </td>
            </tr>
            <tr>
                <td>
                    0.3.1
                </td>
                <td>
                    Grammatik verbessert.
                </td>
            </tr>
        </table>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent);

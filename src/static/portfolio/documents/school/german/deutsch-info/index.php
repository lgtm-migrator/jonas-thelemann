<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Seiten von <a href="https://deutsch.info/" target="_blank" title="Multilingual website for learning German">deutsch.info</a> zur deutschen Grammatik als druckoptimierte PDFs';
    $skeletonContent = '
    <section id="nomen-und-artikelwörter" class="section scrollspy">
        <h2>
            Nomen und Artikelwörter
        </h2>
        <p>
            <ul>
                <li>
                    <a href="data/pdfs/artikel-und-deklination.pdf" rel="noopener" target="_blank" title="Artikel und Deklination">
                        Artikel und Deklination
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/pluralformen.pdf" rel="noopener" target="_blank" title="Pluralformen">
                        Pluralformen
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/zusammengesetzte-nomen.pdf" rel="noopener" target="_blank" title="Zusammengesetzte Nomen">
                        Zusammengesetzte Nomen
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/feminine-nomen-mit-in.pdf" rel="noopener" target="_blank" title="Feminine Nomen mit „-in”">
                        Feminine Nomen mit „-in”
                    </a>
                </li>
            </ul>
        </p>
    </section>
    <section id="pronomen" class="section scrollspy">
        <h2>
            Pronomen
        </h2>
        <p>
            <ul>
                <li>
                    <a href="data/pdfs/personalpronomen.pdf" rel="noopener" target="_blank" title="Personalpronomen">
                        Personalpronomen
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/possessivpronomen.pdf" rel="noopener" target="_blank" title="Possessivpronomen">
                        Possessivpronomen
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/demonstrativpronomen.pdf" rel="noopener" target="_blank" title="Demonstrativpronomen">
                        Demonstrativpronomen
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/pronomen-es.pdf" rel="noopener" target="_blank" title="Pronomen „es“">
                        Pronomen „es“
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/pronomen-man.pdf" rel="noopener" target="_blank" title="Pronomen „man“">
                        Pronomen „man“
                    </a>
                </li>
            </ul>
        </p>
    </section>
    <section id="verben" class="section scrollspy">
        <h2>
            Verben
        </h2>
        <p>
            <ul>
                <li>
                    <a href="data/pdfs/konjugation-der-verben.pdf" rel="noopener" target="_blank" title="Konjugation der Verben">
                        Konjugation der Verben
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/modalverben.pdf" rel="noopener" target="_blank" title="Modalverben">
                        Modalverben
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/zusammengesetzte-verben.pdf" rel="noopener" target="_blank" title="Zusammengesetzte Verben">
                        Zusammengesetzte Verben
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/imperativ.pdf" rel="noopener" target="_blank" title="Imperativ">
                        Imperativ
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/präteritum.pdf" rel="noopener" target="_blank" title="Präteritum">
                        Präteritum
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/perfekt.pdf" rel="noopener" target="_blank" title="Perfekt">
                        Perfekt
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/reflexivverben.pdf" rel="noopener" target="_blank" title="Reflexivverben">
                        Reflexivverben
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/passiv.pdf" rel="noopener" target="_blank" title="Passiv">
                        Passiv
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/konjunktiv-ii.pdf" rel="noopener" target="_blank" title="Konjunktiv II">
                        Konjunktiv II
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/rektion-der-verben.pdf" rel="noopener" target="_blank" title="Rektion der Verben">
                        Rektion der Verben
                    </a>
                </li>
            </ul>
        </p>
    </section>
    <section id="adjektive" class="section scrollspy">
        <h2>
            Adjektive
        </h2>
        <p>
            <ul>
                <li>
                    <a href="data/pdfs/adjektive-im-prädikativen-gebrauch.pdf" rel="noopener" target="_blank" title="Adjektive im prädikativen Gebrauch">
                        Adjektive im prädikativen Gebrauch
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/steigerung-der-adjektive-und-adverbien.pdf" rel="noopener" target="_blank" title="Steigerung der Adjektive und Adverbien">
                        Steigerung der Adjektive und Adverbien
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/adjektivdeklination.pdf" rel="noopener" target="_blank" title="Adjektivdeklination">
                        Adjektivdeklination
                    </a>
                </li>
            </ul>
        </p>
    </section>
    <section id="präpositionen" class="section scrollspy">
        <h2>
            Präpositionen
        </h2>
        <p>
            <ul>
                <li>
                    <a href="data/pdfs/präpositionen.pdf" rel="noopener" target="_blank" title="Präpositionen">
                        Präpositionen
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/von-mit-eigennamen.pdf" rel="noopener" target="_blank" title="„von” mit Eigennamen">
                        „von” mit Eigennamen
                    </a>
                </li>
            </ul>
        </p>
    </section>
    <section id="zahlen" class="section scrollspy">
        <h2>
            Zahlen
        </h2>
        <p>
            <ul>
                <li>
                    <a href="data/pdfs/zahlen.pdf" rel="noopener" target="_blank" title="Zahlen">
                        Zahlen
                    </a>
                </li>
            </ul>
        </p>
    </section>
    <section id="syntax" class="section scrollspy">
        <h2>
            Syntax
        </h2>
        <p>
            <ul>
                <li>
                    <a href="data/pdfs/wortfolge-im-hauptsatz.pdf" rel="noopener" target="_blank" title="Wortfolge im Hauptsatz">
                        Wortfolge im Hauptsatz
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/reihenfolge-der-objekte-im-satz.pdf" rel="noopener" target="_blank" title="Reihenfolge der Objekte im Satz">
                        Reihenfolge der Objekte im Satz
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/negation-nicht.pdf" rel="noopener" target="_blank" title="Negation „nicht”">
                        Negation „nicht”
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/welch-frage.pdf" rel="noopener" target="_blank" title="„welch- Frage”">
                        „welch- Frage”
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/kausalsätze-mit-weil.pdf" rel="noopener" target="_blank" title="Kausalsätze mit „weil”">
                        Kausalsätze mit „weil”
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/objektsätze-mit-dass.pdf" rel="noopener" target="_blank" title="Objektsätze mit „dass”">
                        Objektsätze mit „dass”
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/indirekte-fragesätze.pdf" rel="noopener" target="_blank" title="Indirekte Fragesätze">
                        Indirekte Fragesätze
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/konditionalsätze-mit-wenn.pdf" rel="noopener" target="_blank" title="Konditionalsätze mit „wenn”">
                        Konditionalsätze mit „wenn”
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/konzessivsätze-mit-obwohl-und-trotzdem.pdf" rel="noopener" target="_blank" title="Konzessivsätze mit „obwohl” und „trotzdem”">
                        Konzessivsätze mit „obwohl” und „trotzdem”
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/konsekutivsätze-mit-deshalb.pdf" rel="noopener" target="_blank" title="Konsekutivsätze mit „deshalb”">
                        Konsekutivsätze mit „deshalb”
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/finalsätze-mit-um-zu-und-damit.pdf" rel="noopener" target="_blank" title="Finalsätze mit „um…zu” und „damit”">
                        Finalsätze mit „um…zu” und „damit”
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/relativsätze.pdf" rel="noopener" target="_blank" title="Relativsätze">
                        Relativsätze
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/temporalsätze.pdf" rel="noopener" target="_blank" title="Temporalsätze">
                        Temporalsätze
                    </a>
                </li>
                <li>
                    <a href="data/pdfs/infinitivsätze.pdf" rel="noopener" target="_blank" title="Infinitivsätze">
                        Infinitivsätze
                    </a>
                </li>
            </ul>
        </p>
    </section>';

    output_html($skeletonDescription, $skeletonContent);

<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Spielerische Darstellung des Ziegenproblems für den Mathematikunterricht';
    $skeletonFeatures = ['lcl/ext/css', 'lcl/ext/js'];
    $skeletonContent = '
    <section class="section scrollspy" id="game">
        <h2>
            Spiel
        </h2>
        <div class="row">
            <div class="col s4 center-align">
                <button class="borderless clickable door initial z-depth-2" id="doorOne"></button>
            </div>
            <div class="col s4 center-align">
                <button class="borderless clickable door initial z-depth-2" id="doorTwo"></button>
            </div>
            <div class="col s4 center-align">
                <button class="borderless clickable door initial z-depth-2" id="doorThree"></button>
            </div>
        </div>
        <div class="card-panel">
            <p class="flow-text" id="instructions">
                Hinter zwei Türen befinden sich Ziegen, nur hinter einer ein Auto.
                <br>
                Wähle die Tür, hinter der du das Auto vermutest!
            </p>
        </div>
    </section>
    <section class="section scrollspy" id="links">
        <h2>
            Links
        </h2>
        <p>
            Folgende Websites enthalten weiterführende Informationen oder sind bei diesem Projekt zur Verwendung gekommen.
        </p>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">
                            Wikipedia-Artikel zum Ziegenproblem
                        </span>
                    </div>
                    <div class="card-action">
                        <a href="https://de.wikipedia.org/wiki/Ziegenproblem" target="_blank">
                            wikipedia.org
                        </a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">
                            "True Randomness" by random.org
                        </span>
                    </div>
                    <div class="card-action">
                        <a href="https://www.random.org/" target="_blank">
                            random.org
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="hidden">
        <img src="layout/images/car.png" alt="Car">
        <img src="layout/images/green-door.png" alt="Green Door">
        <img src="layout/images/goat.png" alt="Goat">
    </div>';

    outputHtml($skeletonDescription, $skeletonContent, $skeletonFeatures);

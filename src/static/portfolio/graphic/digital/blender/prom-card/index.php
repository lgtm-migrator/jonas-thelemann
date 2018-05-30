<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Die Entstehung des Designs der Abiball Eintrittskarte und deren Verwendung';
    $skeletonContent = '
    <div class="row">
        <div class="col s12 l6">
            <h3 class="center-align">
                Vorderseite
            </h3>
            <p>
                <img alt="New Prom Card Front" class="materialboxed responsive-img" src="layout/images/prom-card-new-front.jpg">
            </p>
        </div>
        <div class="col s12 l6">
            <h3 class="center-align">
                Rückseite
            </h3>
            <p>
                <img alt="New Prom Card Back" class="materialboxed responsive-img" src="layout/images/prom-card-new-back.jpg">
            </p>
        </div>
    </div>
    <section id="origin" class="section scrollspy">
        <h2>
            Entstehung
        </h2>
        <p>
            ...
        </p>
        <div class="row">
            <h3 class="center-align">
                Anderer Entwurf
            </h3>
            <div class="col s12 l6">
                <p>
                    <img alt="Old Prom Card Front" class="materialboxed responsive-img" src="layout/images/prom-card-old-front.jpg">
                </p>
            </div>
            <div class="col s12 l6">
                <p>
                    <img alt="Old Prom Card Back" class="materialboxed responsive-img" src="layout/images/prom-card-old-back.jpg">
                </p>
            </div>
        </div>
    </section>
    <section id="bonus" class="section scrollspy">
        <h2>
            Bonus
        </h2>
        <p>
            Einfach, weil\'s sein muss!
            Erklärung:
        </p>
        <p>
            <ul class="collection">
                <li class="collection-item">
                    <a href="/portfolio/documents/school/a-level/graduation-prank/" title="Graduation Prank">
                        A­bi­streich
                    </a>
                </li>
            </ul>
        </p>
        <div class="row">
            <div class="col s12 l6 offset-l3">
                <h3 class="center-align">
                    GIF
                </h3>
                <p>
                    <iframe src="//giphy.com/embed/l1KVc65m0G275a79m?hideSocial=true" height="270"class="giphy-embed"></iframe>
                </p>
            </div>
        </div>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent);

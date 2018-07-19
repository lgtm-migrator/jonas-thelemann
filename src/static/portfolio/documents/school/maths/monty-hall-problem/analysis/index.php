<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';

    last_modified(get_page_mod_time());

    $page = 1;
    $limit = 50;
    $tableName = 'monty-hall-problem';

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = intval($_GET['page']);
    }

    $skeletonDescription = 'Auswertung der spielerischen Darstellung des Ziegenproblems für den Mathematikunterricht';
    $skeletonFeatures = ['pkg/chrt/mjs', 'lcl/ext/js'];
    $skeletonContent = '
    <a class="waves-effect waves-light btn" href="../" title="Das Ziegenproblem">
        <i class="material-icons left">
            chevron_left
        </i>
        Zurück zum Spiel
    </a>
    <section id="statistics" class="section scrollspy">
        <h2>
            Sta&shy;tis&shy;ti&shy;ken
        </h2>
        <h3>
            Ge&shy;winn&shy;wahr&shy;schein&shy;lich&shy;kei&shy;ten
        </h3>
        <canvas id="lineChart"></canvas>
        <h3>
            Tür&shy;wahl&shy;häu&shy;fig&shy;kei&shy;ten
        </h3>
        <canvas id="doughnutChart"></canvas>
    </section>
    <section class="section scrollspy">
        <h2>
            Runden
        </h2>
        <div class="center-align" id="roundlist"></div>
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

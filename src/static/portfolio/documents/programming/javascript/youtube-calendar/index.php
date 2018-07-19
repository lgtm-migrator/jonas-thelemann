<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once 'layout/extension/extension.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Zwei virale YouTube Videos am Tag vom 1. bis zum 24. Dezember';
    $skeletonFeatures = ['pkg/ltr/mjs', 'pkg/mmnt/wlcls.mjs', 'pkg/mmnttz/wdt.mjs', 'lcl/ext/js', 'lcl/ext/css'];
    $skeletonContent = '
    <section id="calendar" class="section scrollspy">
        <h2>
            Kalender
        </h2>
        <div class="row">
            <div class="col s12" id="calendarcontainer">
                '.get_calendar_door_html().'
            </div>
            <div class="col s12">
                <p>
                    Um 0:00 Uhr und 12:00 Uhr wird jeweils ein Video freigeschaltet.
                    <br>
                    Noch <strong><span id="countdown">Zeit</span></strong> bis zum nächsten Video.
                </p>
                <div class="progress">
                    <div class="indeterminate" id="countdownprogressbar" style="width: 70%"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="archive" class="section scrollspy">
        <h2>
            Archiv
        </h2>
        <div class="row">
            <div class="col s12">
                <div class="video-container" id="archiveembed">
                </div>
            </div>
        </div>
        <div class="row">
            <form action="layout/extension/extension.php" class="col s12" id="archiveform" method="get">
                <input type="hidden" name="task" value="archive">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">
                            date_range
                        </i>
                        <input class="datepicker" id="date" name="date" type="date" value="'.date('j.n.Y').'">
                        <label for="date" class="active">
                            Datum
                        </label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">
                            video_library
                        </i>
                        <select id="time" name="time">
                            <option value="" disabled selected>
                                Bitte wählen ...
                            </option>
                            <option value="1">
                                Vormittag
                            </option>
                            <option id="time2" value="2">
                                Nachmittag
                            </option>
                        </select>
                        <label>
                            Zeit
                        </label>
                    </div>
                </div>
                <button class="btn disabled waves-effect waves-light" id="submit" type="submit">
                    Öffnen
                    <i class="material-icons right">
                        open_in_new
                    </i>
                </button>
            </form>
        </div>
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);

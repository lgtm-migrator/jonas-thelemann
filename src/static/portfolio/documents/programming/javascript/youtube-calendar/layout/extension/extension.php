<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/time/cron.php';
    include_once dirname(__DIR__).'/data/data.php';

    if (isset($_POST['task'])) {
        if ($_POST['task'] == 'current') {
            echo getCurrentVideoData();
        }
    } elseif (isset($_GET['task'])) {
        if ($_GET['task'] == 'archive' && isset($_GET['date_submit']) && isset($_GET['time'])) {
            $date = strtotime($_GET['date_submit']);
            $dateYear = date('Y', $date);
            $dateMonth = date('n', $date);
            $dateDay = date('j', $date);
            $now = strtotime('now');
            $nowDay = date('j', $now);
            $nowHour = date('G', $now);
            $videoData = null;

            if ($_GET['time'] == 1) {
                $videoData = getVideoData($dateYear, $dateMonth, getArrayFromRange($dateDay.'-'.$dateDay), 0);
            } elseif ($_GET['time'] == 2) {
                $videoData = getVideoData($dateYear, $dateMonth, getArrayFromRange($dateDay.'-'.$dateDay), 12);
            }

            $dayData = json_decode($videoData, true)[0];

            if (count($dayData) > 0) {
                echo key($dayData[0]);
            } else {
                http_response_code(400);
            }
        }
    }

    function getCurrentVideoData()
    {
        $dateArray = explode(';', date('Y;n;j;G'));

        return getVideoData($dateArray[0], $dateArray[1], getArrayFromRange('1-'.$dateArray[2]), $dateArray[3]);
    }

    function getArrayFromRange($range)
    {
        $arr = array();

        if (strpos($range, '-') !== false) {
            $rangeParts = explode('-', $range);
            $rageBegin = intval($rangeParts[0]);
            $rageEnd = intval($rangeParts[1]);

            for ($i = $rageBegin; $i <= $rageEnd; ++$i) {
                array_push($arr, $i);
            }
        } else {
            array_push($arr, $range);
        }

        return $arr;
    }

    function getVideoData($year, $month, $days, $hour)
    {
        global $videos;

        if (array_key_exists($year, $videos) && $month == 12) {
            $currentDay = intval(date('j'));
            $currentHour = intval(date('G'));
            $dayCount = count($days);
            $videoData = array();

            foreach ($days as $day) {
                if (0 < $day && $day < 25) {
                    $dayData = array();

                    if ($dayCount > 1) {
                        if ($day <= $currentDay) {
                            $value = ($day - 1) * 2;

                            if (array_key_exists($value, $videos[$year])) {
                                array_push($dayData, $videos[$year][$value]);
                            }
                        }

                        if ($day < $currentDay || ($day == $currentDay && $hour >= 12)) {
                            $value = ($day - 1) * 2 + 1;

                            if (array_key_exists($value, $videos[$year])) {
                                array_push($dayData, $videos[$year][$value]);
                            }
                        }

                        array_push($videoData, $dayData);
                    } elseif ($dayCount == 1) {
                        if ($hour < 12 && $day <= $currentDay) {
                            $value = ($day - 1) * 2;

                            if (array_key_exists($value, $videos[$year])) {
                                array_push($dayData, $videos[$year][$value]);
                            }
                        } elseif ($hour >= 12 && ($day < $currentDay || ($day == $currentDay && $currentHour >= 12))) {
                            $value = ($day - 1) * 2 + 1;

                            if (array_key_exists($value, $videos[$year])) {
                                array_push($dayData, $videos[$year][$value]);
                            }
                        }

                        array_push($videoData, $dayData);
                    }
                }
            }

            return json_encode($videoData);
        } else {
            return false;
        }
    }

    function getCalendarDoorHtml()
    {
        $calendarDoorHtml = '';

        for ($i = 0; $i < 24; ++$i) {
            $calendarDoorHtml .= '
            <div class="calendardoorcontainer">
                <div class="doorpartcontainer">
                    <div class="disabled doorpart z-depth-1 center-align valign-wrapper">
                        <span class="noselect valign">
                            Vor&shy;mit&shy;tag
                        </span>
                    </div>
                    <div class="disabled doorpart z-depth-1 center-align valign-wrapper">
                        <span class="noselect valign">
                            Nach&shy;mit&shy;tag
                        </span>
                    </div>
                </div>
                <div class="calendardoorcard z-depth-3">
                    <div class="borderless calendardoor disabled center-align valign-wrapper">
                        <span class="noselect valign">
                            <div class="preloader-wrapper small active">
                                <div class="spinner-layer spinner-green-only">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>';
        }

        return $calendarDoorHtml;
    }

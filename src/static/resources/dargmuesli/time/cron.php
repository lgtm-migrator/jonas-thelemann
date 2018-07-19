<?php
    function get_last_countdown_date($countdownCrons)
    {
        if (is_array($countdownCrons) && count($countdownCrons) > 0) {
            $lastRunTime = null;

            foreach ($countdownCrons as $countdownCron) {

            }

            return $lastRunTime;
        } else {
            trigger_error('First parameter must be a filled array.');
        }
    }

    function get_next_countdown_date($countdownCrons) {
        if (is_array($countdownCrons) && count($countdownCrons) > 0) {
            $nextRunTime = null;

            foreach ($countdownCrons as $countdownCron) {
                $cron = Cron\CronExpression::factory($countdownCron);
                $potentialNextRunTime = $cron->getNextRunDate()->format('U');

                if ($potentialNextRunTime < $nextRunTime || $nextRunTime == null) {
                    $nextRunTime = $potentialNextRunTime;
                }
            }

            return date('Y-m-d H:i:s', $nextRunTime);
        } else {
            trigger_error('First parameter must be a filled array.');
        }
    }

<?php
    function writeFile($filePath, $content)
    {
        $resource = fopen($filePath, 'w') or die('Unable to write file!');

        fwrite($resource, $content);
        fclose($resource);

        echo 'ok';
    }

    function getChangeFreq($lastModification)
    {
        $now = new DateTime();
        $lastModification = new DateTime($lastModification);

        $interval = $now->diff($lastModification, true);

        if ($interval->format('%y') < 5) {
            if ($interval->format('%y') < 1) {
                if ($interval->format('%m') < 1) {
                    if ($interval->format('%d') < 7) {
                        if ($interval->format('%d') < 1) {
                            return 'hourly';
                        } else {
                            return 'daily';
                        }
                    } else {
                        return 'weekly';
                    }
                } else {
                    return 'monthly';
                }
            } else {
                return 'yearly';
            }
        } else {
            return 'never';
        }
    }

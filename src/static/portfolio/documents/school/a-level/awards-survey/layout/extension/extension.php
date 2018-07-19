<?php
    $studentNames = '[\'REDACTED\'];';
    $teacherNames = '[\'REDACTED\'];';

    function get_anonymized_names($names)
    {
        $anonymizedNames = preg_replace('/(\\B\\p{L})/Uu', '*', $names);

        return $anonymizedNames;
    }

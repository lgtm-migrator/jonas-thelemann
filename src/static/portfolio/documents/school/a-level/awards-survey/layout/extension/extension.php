<?php
    $studentNames = '[\'REDACTED\'];';
    $teacherNames = '[\'REDACTED\'];';

    function getAnonymizedNames($names)
    {
        $anonymizedNames = preg_replace('/(\\B\\p{L})/Uu', '*', $names);

        return $anonymizedNames;
    }

<?php
    function isSurveyOpen($dbh, $surveyName)
    {
        return $dbh
        ->query("SELECT open FROM surveys WHERE name='$surveyName'")
        ->fetch()['open'];
    }

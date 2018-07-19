<?php
    function is_survey_open($dbh, $surveyName)
    {
        $stmt = $dbh->prepare('SELECT open FROM surveys WHERE name = :name');
        $stmt->bindParam(':name', $surveyName);

        if (!$stmt->execute()) {
            throw new PDOException($stmt->errorInfo()[2]);
        }

        return $stmt->fetch()['open'];
    }

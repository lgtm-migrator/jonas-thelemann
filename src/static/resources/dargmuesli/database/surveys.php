<?php
    function isSurveyOpen($dbh, $surveyName)
    {
        $stmt = $dbh->prepare('SELECT open FROM surveys WHERE name = :surveyName');
        $stmt->bindParam(':surveyname', $surveyName);

        if (!$stmt->execute()) {
            throw new PDOException($stmt->errorInfo()[2]);
        }

        return $stmt->fetch();
    }

<?php
    function getFirstName($fullName)
    {
        getNamePart($fullName, true);
    }

    function getLastName($fullName)
    {
        getNamePart($fullName, false);
    }

    function getCensoredName($name, $rtStarCensoring)
    {
        if ($rtStarCensoring) {
            return preg_replace('/(\\B\\p{L})/Uu', '*', $name);
        } else {
            return preg_replace('/(\\B\\p{L})/Uu', '-', $name);
        }
    }

    function getCensoredNameStar($name)
    {
        getCensoredName($name, false);
    }

    function getCensoredNameLine($name)
    {
        getCensoredName($name, true);
    }

    function getCensoredFullName($fullName, $rtStarCensoring)
    {
        return getCensoredName(getFirstName($fullName), $rtStarCensoring).' '.getCensoredName(getLastName($fullName), $rtStarCensoring);
    }

    function getCensoredFullNameStar($fullName)
    {
        getCensoredFullName($fullName, false);
    }

    function getCensoredFullNameLine($fullName)
    {
        getCensoredFullName($fullName, true);
    }

    function getNamePart($fullName, $rtFirstName)
    {
        $parts = explode(' ', $fullName);
        $lastName = array_pop($parts);
        $firstName = implode(' ', $parts);

        if ($rtFirstName) {
            return $firstName;
        } else {
            return $lastName;
        }
    }

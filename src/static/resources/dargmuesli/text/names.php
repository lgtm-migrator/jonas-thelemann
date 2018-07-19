<?php
    function get_first_name($fullName)
    {
        get_name_part($fullName, true);
    }

    function get_last_name($fullName)
    {
        get_name_part($fullName, false);
    }

    function get_censored_name($name, $rtStarCensoring)
    {
        if ($rtStarCensoring) {
            return preg_replace('/(\\B\\p{L})/Uu', '*', $name);
        } else {
            return preg_replace('/(\\B\\p{L})/Uu', '-', $name);
        }
    }

    function get_censored_name_star($name)
    {
        get_censored_name($name, false);
    }

    function get_censored_name_line($name)
    {
        get_censored_name($name, true);
    }

    function get_censored_full_name($fullName, $rtStarCensoring)
    {
        return get_censored_name(get_first_name($fullName), $rtStarCensoring).' '.get_censored_name(get_last_name($fullName), $rtStarCensoring);
    }

    function get_censored_full_name_star($fullName)
    {
        get_censored_full_name($fullName, false);
    }

    function get_censored_full_name_line($fullName)
    {
        get_censored_full_name($fullName, true);
    }

    function get_name_part($fullName, $rtFirstName)
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

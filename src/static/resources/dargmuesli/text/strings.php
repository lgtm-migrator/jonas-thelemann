<?php
    function starts_with($haystack, $needle)
    {
        if (is_array($haystack)) {
            $starts_with = false;

            foreach ($haystack as $haystackItem) {
                if (!is_string($haystackItem)) {
                    throw new Exception('"'.$haystackItem.'" is not a string!');
                }

                if (substr($haystackItem, 0, strlen($needle)) === $needle) {
                    $starts_with = true;
                    break;
                }
            }

            return $starts_with;
        } elseif (is_string($haystack)) {
            if (substr($haystack, 0, strlen($needle)) === $needle) {
                return true;
            } else {
                return false;
            }
        } else {
            throw new Exception('"'.$haystack.'" is neither a string nor an array!');
        }
    }

    function trim_value(&$value)
    {
        $value = trim($value);
    }

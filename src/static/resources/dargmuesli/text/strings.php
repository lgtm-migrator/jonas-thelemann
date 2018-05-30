<?php
    function startsWith($haystack, $needle)
    {
        if (is_array($haystack)) {
            $startsWith = false;

            foreach ($haystack as $haystackItem) {
                if (!is_string($haystackItem)) {
                    throw new Exception('"'.$haystackItem.'" is not a string!');
                }

                if (substr($haystackItem, 0, strlen($needle)) === $needle) {
                    $startsWith = true;
                    break;
                }
            }

            return $startsWith;
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

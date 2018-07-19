<?php
    $counter = -1;

    function use_counter()
    {
        global $counter;

        ++$counter;

        return $counter;
    }

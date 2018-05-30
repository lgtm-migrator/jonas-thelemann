<?php
    $counter = -1;

    function useCounter()
    {
        global $counter;

        ++$counter;

        return $counter;
    }

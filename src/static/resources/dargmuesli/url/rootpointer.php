<?php
    $rootPointerInteger = null;
    $rootPointerString = null;

    intitialize_root_pointer();

    function get_root_pointer_string($level)
    {
        $rootPointerString = '';

        for ($i = 0; $i < $level; $i++) {
            $rootPointerString .= '../';
        }

        return $rootPointerString;
    }

    function intitialize_root_pointer()
    {
        global $rootPointerInteger;
        global $rootPointerString;

        $rootPointerInteger = substr_count($_SERVER['REQUEST_URI'], '/') - 1;
        $rootPointerString = get_root_pointer_string($rootPointerInteger);
    }

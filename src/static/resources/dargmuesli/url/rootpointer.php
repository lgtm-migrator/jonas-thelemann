<?php
    $rootPointerInteger = null;
    $rootPointerString = null;

    intitializeRootPointer();

    function getRootPointerString($level)
    {
        $rootPointerString = '';

        for ($i = 0; $i < $level; $i++) {
            $rootPointerString .= '../';
        }

        return $rootPointerString;
    }

    function intitializeRootPointer()
    {
        global $rootPointerInteger;
        global $rootPointerString;

        $rootPointerInteger = substr_count($_SERVER['REQUEST_URI'], '/') - 1;
        $rootPointerString = getRootPointerString($rootPointerInteger);
    }

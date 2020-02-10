<?php
    function load_env_file($folder, $file = 'jonas-thelemann.env', $override = false)
    {

        $dotenv = null;

        if ($override) {
            $dotenv = Dotenv\Dotenv::createMmutable($folder, $file);
            $dotenv->overload();
        } else {
            $dotenv = Dotenv\Dotenv::createImmutable($folder, $file);
            $dotenv->load();
        }

        return $dotenv;
    }

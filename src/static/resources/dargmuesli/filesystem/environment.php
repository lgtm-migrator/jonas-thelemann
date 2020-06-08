<?php
    function load_env_file($folder, $file = 'jonas-thelemann.env', $override = false)
    {

        $dotenv = null;

        if ($override) {
            $dotenv = Dotenv\Dotenv::createMutable($folder, $file);
            $dotenv->overload();
        } else {
            $dotenv = Dotenv\Dotenv::createImmutable($folder, $file);
            $dotenv->load();
        }

        return $dotenv;
    }

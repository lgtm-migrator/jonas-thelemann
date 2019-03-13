<?php
    function load_env_file($folder, $file = '.env', $override = false)
    {
        $dotenv = Dotenv\Dotenv::create($folder, $file);
        ($override) ? $dotenv->overload() : $dotenv->load();
        return $dotenv;
    }

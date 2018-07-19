<?php
    function load_env_file($folder, $file = '.env', $override = false)
    {
        $dotenv = new Dotenv\Dotenv($folder, $file);
        ($override) ? $dotenv->overload() : $dotenv->load();
        return $dotenv;
    }

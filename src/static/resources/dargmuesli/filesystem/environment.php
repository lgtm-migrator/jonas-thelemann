<?php
    function loadEnvFile($path = '.env', $override = false)
    {
        $dotenv = new Dotenv\Dotenv($path);
        ($override) ? $dotenv->overload() : $dotenv->load();
        return $dotenv;
    }

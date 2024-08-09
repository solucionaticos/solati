<?php

class Auth
{
    public static function authenticate(string $username, string $password): bool
    {
        $config = require __DIR__.'/../config/config.php';

        return $username === $config['auth']['username'] && $password === $config['auth']['password'];
    }
}
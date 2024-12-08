<?php

namespace App;

class CsrfToken
{
    public static function generate(): string
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    public static function validate(string $token): bool
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        return hash_equals($_SESSION['csrf_token'] ?? '', $token);
    }
}

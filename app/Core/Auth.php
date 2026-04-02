<?php

declare(strict_types=1);

namespace App\Core;

class Auth
{
    public static function attempt(string $username, string $password): bool
    {
        $validUsername = 'admin';
        $validPassword = 'password123';

        if ($username === $validUsername && $password === $validPassword) {
            $_SESSION['user'] = [
                'username' => $username,
            ];

            return true;
        }

        return false;
    }

    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function logout(): void
    {
        unset($_SESSION['user']);
    }
}
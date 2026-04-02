<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;

class AuthController
{
    public function showLogin(): void
    {
        $error = null;
        require __DIR__ . '/../../resources/views/auth/login.php';
    }

    public function login(): void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (Auth::attempt($username, $password)) {
            header('Location: /books');
            exit;
        }

        $error = 'Invalid credentials.';
        require __DIR__ . '/../../resources/views/auth/login.php';
    }

    public function logout(): void
    {
        Auth::logout();
        header('Location: /login');
        exit;
    }
}
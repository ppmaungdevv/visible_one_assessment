<?php
namespace App\Controllers;

use App\Models\User;
use App\Services\AuthService;

class UsersController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        if ($this->authService->isLoggedIn()) {
            header('Location: /products');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->authService->login($username, $password)) {
                header('Location: /products');
                exit;
            } else {
                $error = 'Invalid username or password';
            }
        }

        require __DIR__ . '/../Views/Users/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'] ?? 'user';
            if ($this->authService->register($username, $password, $role)) {
                header('Location: /login');
                exit;
            } else {
                $error = 'Registration failed';
            }
        }

        require __DIR__ . '/../Views/Users/register.php';
    }

    public function logout()
    {
        $this->authService->logout();
        header('Location: /login');
        exit;
    }
}

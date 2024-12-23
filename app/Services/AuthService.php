<?php
namespace App\Services;

use App\Models\User;

class AuthService
{
    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function login($username, $password)
    {
        $user = $this->userModel->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            return true;
        }
        return false;
    }

    public function register($username, $password, $role = 'user')
    {
        return $this->userModel->create($username, $password, $role);
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function isAdmin()
    {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
            return true;
        }
        return false;
    }
}

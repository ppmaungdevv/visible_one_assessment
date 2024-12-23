<?php
namespace App\Models;

class User
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByUsername($username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($username, $password, $role)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $hashedPassword, $role]);
    }

    public function getUserRole($userId)
    {
        $stmt = $this->pdo->prepare("SELECT role FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchColumn();
    }
}

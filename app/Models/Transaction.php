<?php

namespace App\Models;

class Transaction
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($productId, $userId, $quantity, $totalPrice)
    {
        $stmt = $this->pdo->prepare("INSERT INTO transactions (product_id, user_id, quantity, total_price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$productId, $userId, $quantity, $totalPrice]);
    }
}

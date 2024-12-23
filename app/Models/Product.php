<?php

namespace App\Models;

class Product
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM products');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($name, $price, $quantityAvailable)
    {
        $stmt = $this->pdo->prepare('INSERT INTO products (name, price, quantity_available) VALUES (?, ?, ?)');
        return $stmt->execute([$name, $price, $quantityAvailable]);
    }

    public function update($id, $name, $price, $quantityAvailable)
    {
        $stmt = $this->pdo->prepare('UPDATE products SET name = ?, price = ?, quantity_available = ? WHERE id = ?');
        return $stmt->execute([$name, $price, $quantityAvailable, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = ?');
        return $stmt->execute([$id]);
    }
}

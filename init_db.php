<?php
// $pdo = new PDO('mysql:host=db;dbname=vending_machine', 'user', 'user_password');
$pdo = new PDO("mysql:host=mysql;port=3306;dbname=vending_machine", 'user', 'user_password');


// Create Users Table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role ENUM('admin', 'user') NOT NULL
    )
");

// Create Products Table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 3) NOT NULL,
        quantity_available INT NOT NULL
    )
");

// Create Transactions Table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL,
        total_price DECIMAL(10, 2) NOT NULL,
        transaction_date DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
    )
");

echo "Tables created successfully!";

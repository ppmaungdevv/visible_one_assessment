<?php

// Autoload dependencies
require_once __DIR__ . '/../vendor/autoload.php';

$host=getenv('DB_HOST');
$dbname = getenv('DB_DATABASE');     // vending_machine
$username = getenv('DB_USERNAME');   // user
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO("mysql:host=mysql;port=3306;dbname=vending_machine", 'user', 'user_password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print('xxxxxxxxxxxxxxxxx' . $e->getMessage());
    die('Database connection failed: ' . $e->getMessage());
}

return $pdo;
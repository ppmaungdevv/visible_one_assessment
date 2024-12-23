<?php

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/Models/User.php';
require_once __DIR__ . '/Services/AuthService.php';
require_once __DIR__ . '/Controllers/ProductsController.php';
require_once __DIR__ . '/Controllers/UsersController.php';

session_start();

$pdo = require __DIR__ . '/database.php';

$userModel = new \App\Models\User($pdo);
$authService = new \App\Services\AuthService($userModel);
$productsController = new \App\Controllers\ProductsController($authService, $pdo);
$usersController = new \App\Controllers\UsersController($authService);

return [
    'pdo' => $pdo,
    'authService' => $authService,
    'productsController' => $productsController,
    'usersController' => $usersController,
];


// Autoload dependencies
// require_once __DIR__ . '/../vendor/autoload.php';

// $host=getenv('DB_HOST');
// $dbname = getenv('DB_DATABASE');     // vending_machine
// $username = getenv('DB_USERNAME');   // user
// $password = getenv('DB_PASSWORD');

// try {
//     $pdo = new PDO("mysql:host=mysql;port=3306;dbname=vending_machine", 'user', 'user_password');
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     print('xxxxxxxxxxxxxxxxx' . $e->getMessage());
//     die('Database connection failed: ' . $e->getMessage());
// }

// return $pdo;
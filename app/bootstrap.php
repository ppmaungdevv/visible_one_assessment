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
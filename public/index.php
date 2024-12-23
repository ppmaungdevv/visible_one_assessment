<?php

$dependencies = require_once __DIR__ . '/../app/bootstrap.php';

$authService = $dependencies['authService'];
$productsController = $dependencies['productsController'];
$usersController = $dependencies['usersController'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode('/', $uri);

// Handle product routes with dynamic parameters
if ($uriSegments[1] == 'products') {
    if (isset($uriSegments[2])) {
        switch ($uriSegments[2]) {
            case 'create':
                $productsController->create();
                break;
            case 'edit':
                if (isset($uriSegments[3])) {
                    // Extract the product ID from the URL
                    $productId = (int)$uriSegments[3];
                    $productsController->edit($productId);
                } else {
                    http_response_code(404);
                    echo "Product ID is required for edit.";
                }
                break;
            case 'delete':
                if (isset($uriSegments[3])) {
                    // Extract the product ID from the URL
                    $productId = (int)$uriSegments[3];
                    $productsController->delete($productId);
                } else {
                    http_response_code(404);
                    echo "Product ID is required for deletion.";
                }
                break;
            case 'purchase':
                if (isset($uriSegments[3])) {
                    // Extract the product ID from the URL
                    $productId = (int)$uriSegments[3];
                    $productsController->purchase($productId);
                } else {
                    http_response_code(404);
                    echo "Product ID is required for deletion.";
                }
                break;
            default:
                $productsController->index();
                break;
        }
    } else {
        $productsController->index();
    }
}
// Handle user authentication routes
elseif ($uriSegments[1] == 'login') {
    $usersController->login();
} elseif ($uriSegments[1] == 'register') {
    $usersController->register();
} elseif ($uriSegments[1] == 'logout') {
    $usersController->logout();
} elseif (empty($uriSegments[0])) {
    $usersController->login();
}
else {
    var_dump( $uriSegments);
    http_response_code(404);
    echo "Page not found";
}
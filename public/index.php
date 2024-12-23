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

// switch ($uri) {
//     case '/login':
//         $usersController->login();
//         break;
//     case '/register':
//         $usersController->register();
//         break;
//     case '/logout':
//         $usersController->logout();
//         break;
//     case '/products':
//         $productsController->index();
//         break;
//     case '/products/create':
//         $productsController->create();
//         break;
//     case '/products/edit':
//         $productsController->edit();
//         break;
//     case '/products/delete':
//         $productsController->delete();
//         break;
//     default:
//         http_response_code(404);
//         echo "Page not found";
//         break;
// }



// require_once __DIR__ . '/../app/bootstrap.php';

// use App\Controllers\ProductsController;

// // Route requests to the appropriate controller method

// $pdo = require __DIR__ . '/../app/bootstrap.php';
// $controller = new ProductsController($pdo);
// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// if ($uri == '/products' || $uri == '/products/') {
//     $controller->index();
// }
//  elseif ($uri == '/products/create') {
//     $controller->create();
// }
// elseif (preg_match('/^\/products\/edit\/(\d+)$/', $uri, $matches)) {
//     $controller->edit($matches[1]);
// } 
// elseif (preg_match('/^\/products\/delete\/(\d+)$/', $uri, $matches)) {
//     $controller->delete($matches[1]);
// } 
// else {
//     header("HTTP/1.0 404 Not Found");
//     echo '404 Not Found';
// }

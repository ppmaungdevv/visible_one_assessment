<?php

namespace App\Controllers;

use App\Models\Product;
use App\Services\AuthService;
use App\Models\Transaction;

class ProductsController
{
    private $productModel;
    private $authService;

    public function __construct(AuthService $authService, \PDO $pdo)
    {   
        $this->pdo = $pdo;
        $this->authService = $authService;
    }
    
    public function index()
    {

        if (!$this->authService->isLoggedIn()) {
            header('Location: /login');
            exit;
        }

        $this->productModel = new Product($this->pdo);
        $products = $this->productModel->getAll();
        $is_admin = $this->authService->isAdmin();

        require __DIR__ . '/../Views/Products/index.php';
    }

    public function create()
    {
        if (!$this->authService->isAdmin()) {
            header('Location: /products');  // Redirect to home page if not an admin
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity_available = $_POST['quantity_available'];
            $this->productModel = new Product($this->pdo);
            $this->productModel->create($name, $price, $quantity_available);
            header('Location: /products');
            exit;
        }

        require __DIR__ . '/../Views/Products/create.php';
    }

    public function edit($id)
    {
        if (!$this->authService->isAdmin()) {
            header('Location: /products');  // Redirect to home page if not an admin
            exit;
        }

        $this->productModel = new Product($this->pdo);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity_available = $_POST['quantity_available'];
            $this->productModel->update($id, $name, $price, $quantity_available);
            header('Location: /products');
            exit;
        }

        $product = $this->productModel->getById($id);
        require __DIR__ . '/../Views/Products/edit.php';
    }

    public function delete($id)
    {
        if (!$this->authService->isAdmin()) {
            header('Location: /products');  // Redirect to home page if not an admin
            exit;
        }

        $this->productModel = new Product($this->pdo);
        $this->productModel->delete($id);
        header('Location: /products');
        exit;
    }

    public function purchase($id) {

        if (!$this->authService->isLoggedIn()) {
            header('Location: /login');
            exit;
        }

        $this->productModel = new Product($this->pdo);
        $product = $this->productModel->getById($id);

        if (!$product) {
            header('Location: /products');
            exit;
        }

        // Check if the product is available
        if ($product['quantity_available'] <= 0) {
            // Show error message (Product out of stock)
            echo 'Sorry, this product is out of stock.';
            exit;
        }

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Check for quantity in the purchase request (validate the input)
            $quantityToBuy = $_POST['quantity'] ?? 1;  // Default to 1 if not provided
            if ($quantityToBuy > $product['quantity_available']) {
                // Show error message (Not enough stock)
                echo 'Sorry, not enough stock available.';
                exit;
            }

            $newQuantity = $product['quantity_available'] - $quantityToBuy;
            $this->productModel->update($id, $product['name'], $product['price'], $newQuantity);

            $totalPrice = $product['price'] * $quantityToBuy;

            $transactionModel = new Transaction($this->pdo);

            $userId = $_SESSION['user_id']; // Assuming the user is logged in
            
            $transactionModel->create($id, $userId, $quantityToBuy, $totalPrice);

            header('Location: /products');
            exit;
        }

        require __DIR__ . '/../Views/Products/purchase.php';
    }
}

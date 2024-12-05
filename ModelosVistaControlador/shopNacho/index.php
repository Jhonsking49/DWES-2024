<?php
session_start();
require_once "controllers/ProductController.php";
require_once "controllers/UserController.php";

$productController = new ProductController();
$userController = new UserController();

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userController->login($username, $password);
        }
        break;
    case 'logout':
        $userController->logout();
        break;
    default:
        if (isset($_SESSION['user'])) {
            $productController->showProducts();
        } else {
            require_once "views/login.php";
        }
        break;
}
?>

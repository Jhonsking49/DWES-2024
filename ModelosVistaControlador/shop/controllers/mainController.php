<?php

require_once("models/UserModel.php");
require_once("models/UserRepository.php");

require_once("models/ProductModel.php");
require_once("models/ProductRepository.php");

require_once("models/CartUtility.php");

require_once("models/LineModel.php");
require_once("models/LineRepository.php");

require_once("models/OrderModel.php");
require_once("models/OrderRepository.php");

require_once("models/CartModel.php");
require_once("models/CartRepository.php");

session_start();


if (!empty($_GET['c'])) {
    if ($_GET['c'] == "user") {
        require_once("controllers/userController.php");
    }
    if ($_GET['c'] == "product") {
        require_once("controllers/productController.php");
    }
    if ($_GET['c'] == "admin") {
        require_once("controllers/adminController.php");
    }
    if ($_GET['c'] == "api") {
        require_once("controllers/apiController.php");
    }
}


if (empty($_SESSION['user'])) {
    include("views/LoginView.php");
}

$products = ProductRepository::getAllProducts();
//$product = ProductRepository::getProductById($item['product_id']);
if (!empty($_SESSION["user"])) {
    $totalCarrito = CartUtility::calcularTotalCarrito($_SESSION['user']->getCart());
}
include("views/MainView.php");?>

?>
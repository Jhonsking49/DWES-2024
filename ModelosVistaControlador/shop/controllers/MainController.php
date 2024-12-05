<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("models/LineModel.php");
require_once("models/LineRepository.php");
require_once("models/OrderModel.php");
require_once("models/OrderRepository.php");
require_once("models/ProductModel.php");
require_once("models/ProductRepository.php");
require_once("models/UserModel.php");
require_once("models/UserRepository.php");

session_start();

if (isset($_GET["main"])) {
    $_GET["main"] == "auth" && require_once("controllers/AuthController.php");
    $_GET["main"] == "user" && require_once("controllers/UserController.php");
    $_GET["main"] == "product" && require_once("controllers/ProductController.php");
    $_GET["main"] == "line" && require_once("controllers/LineController.php");
    $_GET["main"] == "order" && require_once("controllers/OrderController.php");
} else {
    // Verificar si el usuario no está autenticado, mostrar el formulario de inicio de sesión
    if (empty($_SESSION) || empty($_SESSION["user"])) {
        include("views/LoginView.php");
        die;
    }

    // Cargar el controlador de productos para obtener todos los productos
    if (isset($_SESSION)) {
        require_once("controllers/ProductController.php");
        
        // Obtener todos los productos mediante el ProductController
        $products = ProductController::getAllProducts();

        // Incluir la vista MainView y pasarle la variable $products
        include("views/MainView.php");
        die;
    }
}
?>

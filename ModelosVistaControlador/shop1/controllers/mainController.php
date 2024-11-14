<?php
//cargamos el modelo
require_once 'models/User.php';
require_once 'models/UserRepository.php';
require_once 'models/Product.php';
require_once 'models/ProductRepository.php';

require_once 'models/Order.php';
require_once 'models/OrderRepository.php';
require_once 'models/LineOrder.php';
require_once 'models/LineOrderRepository.php';


session_start();

if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php');
}

if (!isset($_SESSION['user']))
    // cargar la vista
    require_once 'views/loginView.phtml';
else {
    $products = ProductRepository::getProducts();
    require_once 'views/mainView.phtml';
}

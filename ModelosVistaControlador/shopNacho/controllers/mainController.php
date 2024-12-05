<?php

require_once 'models/UserModel.php';
require_once 'models/ProductModel.php';
require_once 'models/UserRepository.php';
require_once 'models/ProductRepository.php';

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
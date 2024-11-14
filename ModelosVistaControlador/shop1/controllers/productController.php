<?php

require_once 'helpers/fileHelper.php';

if (isset($_GET['newProduct'])) {
    require_once('views/newProductView.phtml');
    exit();
}

if (isset($_POST['addProduct'])) {
    // Validate and sanitize inputs
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $stock = trim($_POST['stock']);

    if (isset($_FILES['img']['name']))
        FileHelper::fileHandler($_FILES['img']['tmp_name'], 'public/images/' . $_FILES['name']);

    ProductRepository::addProduct($name, $price, $stock, $description, $_FILES['img']['name']);
    header('Location: index.php');
    exit();
}

if (isset($_GET['addToCart'])) {

    $_SESSION['user']->getCart()->addLine($_GET['addToCart']);

    header('Location: index.php?c=order&cart');
    exit();
}

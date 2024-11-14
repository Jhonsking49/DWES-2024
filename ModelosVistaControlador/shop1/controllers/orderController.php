<?php

if (isset($_GET['cart'])) {
    require_once 'views/CartView.phtml';
    exit();
}

if (isset($_GET['confirm'])) {
    // comprobar el stock y actualizar
    foreach ($_SESSION['user']->getCart()->getOrderLines() as $line) {
        if ($line->getProduct()->getStock() > $line->getQuantity()) {
            $line->getProduct()->updateStock($line->getQuantity());
        }
    }
    $_SESSION['user']->getCart()->setState(1);
    //cambiar el estado del pedido
    //informar al usuario
    $_SESSION['info'] = "pedido finalizado";
    header("location: index.php");
    exit();
}

if (isset($_GET['registry'])) {
    require_once 'views/RegistryView.phtml';
    exit();
}

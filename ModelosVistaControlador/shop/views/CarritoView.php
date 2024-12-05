<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
</head>
<body>
    <h1>Revisar/realizar compra</h1>
<?php

    $total = 0;

    foreach($_SESSION['user']->getPedidoActual()->getLines() as $line){
        $product = ProductRepository::getProductById($line->getIdProduct());
        $precioPack = $line->getLot()*$product->getPrice();
        echo '<div style="background-color: #ccc; width:40%; margin-bottom:20px; padding: 10px; padding-left:30px; border-radius:25px;">';
        echo '<h3>'.$product->getName().'</h3>';
        echo '<p>'.$product->getDescription().'</p>';
        echo "<img src='public/img/".$product->getImage()."' width='300px'/>";
        echo '<p style="font-size:20px;">Precio: '.$product->getPrice().'€</p>';
        echo '<p style="font-size:20px;">Cantidad: '.$line->getLot().'</p>';
        echo '<p style="font-size:20px;"><b>Precio completo: '.$precioPack.'€</b></p>';
        echo '</div>';
        $total+=$precioPack;
    }

    echo '<h3>Precio total de la compra: '.$total.'€</h3>';
?>
    <form action="" method="POST">
        <input type="submit" name="confirmarCompra" value="Confirmar compra">
    </form>
    <br><br>

<a href="index.php">Volver a la tienda</a>
</body>
</html>
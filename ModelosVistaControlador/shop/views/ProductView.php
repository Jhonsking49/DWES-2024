<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
</head>
<body>
    <?php
        $product = $products[$_GET['product']-1];
        echo '<h1>'.$product->getName().'</h1>';
        echo "<img src='public/img/".$product->getImage()."' width='600px'/><br>";
        echo '<p>'.$product->getDescription().'</p>';
        echo '<p>Precio de venta: '.$product->getPrice().'€</p>';
    
    echo '<form action="" method="POST">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" required>
            <input type="hidden" name="idProduct" value="'.$product->getId().'">
            <input type="submit" name="comprar" value="Añadir al carrito">
        </form>';    
    ?>
        <br><br>
    <?php
        echo '<a href="index.php">Volver a la tienda</a>';
    ?>
</body>
</html>
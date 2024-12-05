<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="styles.css"> <!-- Agrega tus estilos -->
</head>
<body>
    <h1>Productos Disponibles</h1>
    <div class="product-container">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <h2><?php echo htmlspecialchars($product->getDescription()); ?></h2>
                <p>Precio: <?php echo htmlspecialchars($product->getPrice()); ?>€</p>
                <p>Stock: <?php echo htmlspecialchars($product->getQuantity()); ?></p>
                <form method="POST" action="index.php?main=line&action=addToCart">
                    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>">
                    <input type="number" name="quantity" min="1" max="<?php echo $product->getQuantity(); ?>" value="1">
                    <button type="submit">Añadir al carrito</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

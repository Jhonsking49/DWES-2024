<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: views/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>
    <?php foreach ($products as $product): ?>
        <div>
            <h2><?php echo $product['name']; ?></h2>
            <p><?php echo $product['description']; ?></p>
            <img src="<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>">
            <p>Precio: <?php echo $product['price']; ?></p>
            <p>Stock: <?php echo $product['stock']; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>

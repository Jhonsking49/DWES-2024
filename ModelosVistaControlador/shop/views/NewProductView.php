<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
</head>
<body>
    <h1>Añadir nuevo producto</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Nombre:</label><br>
        <input type="text" name="name" required><br><br>
        <label for="description">Descripción:</label><br>
        <textarea name="description" rows="10" required></textarea><br><br>
        <label for="price">Precio:</label><br>
        <input type="number" step="0.01" name="price" required><br><br>
        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" required><br><br>
        <label for="img">Imagen:</label><br>
        <input type="file" name="img" required> <br><br><br>
        <input type="submit" name="newProduct" value="Subir producto">
    </form><br><br>

    <a href='index.php'>Volver a la tienda</a>
</body>
</html>
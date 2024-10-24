<!DOCTYPE html>
<html lang="es">
    <?php
        // Conexión a la base de datos
        $db = new mysqli("localhost", "root", "", "prueba");

        // Consulta a la tabla 'users'
        $q = "SELECT * FROM films";
        $result = $db->query($q);
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        if ($row = $result->fetch_assoc()) {
            echo "<p>ID: " . $row['id'] . "</p>";
            echo "<p>Título: " . $row['title'] . "</p>";
            echo "<p>Director: " . $row['director'] . "</p>";
            echo "<p>Año: " . $row['year'] . "</p>";

            // Definir la ruta local de la imagen almacenada
            $imagePath = "images/" . $row['poster']; // Asegúrate de que 'poster' contiene el nombre de la imagen

            // Mostrar la imagen del poster desde la carpeta local
            if (file_exists($imagePath)) {
                echo "<p>Poster:</p>";
                echo "<img src='" . $imagePath . "' alt='Poster de la película' style='width: 200px; height: auto;'>";
            } else {
                echo "<p>No se encontró la imagen del poster.</p>";
            }
        }
    ?>
    
</body>
</html>

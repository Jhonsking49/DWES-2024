<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nueva Película</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de tener un archivo de estilos separado -->
</head>
<body>
    <div class="container">
        <h2>Agregar Nueva Película</h2>
        <form method="POST" action="FilmController.php?action=add">
            <label for="title">Título:</label>
            <input type="text" name="title" required><br><br>

            <label for="director">Director:</label>
            <input type="text" name="director" required><br><br>

            <label for="year">Año:</label>
            <input type="number" name="year" required><br><br>

            <label for="poster">Poster (URL):</label>
            <input type="text" name="poster" required><br><br>

            <button type="submit" name="add">Agregar Película</button>
        </form>
    </div>
</body>
</html>

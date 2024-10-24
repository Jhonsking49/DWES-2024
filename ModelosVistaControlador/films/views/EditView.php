<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Película</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de tener un archivo de estilos separado -->
</head>
<body>
    <div class="container">
        <h2>Editar Película</h2>
        <form method="POST" action="FilmController.php?action=edit">
            <input type="hidden" name="id" value="<?php echo $film->getId(); ?>">
            
            <label for="title">Título:</label>
            <input type="text" name="title" value="<?php echo $film->getTitle(); ?>" required><br><br>

            <label for="director">Director:</label>
            <input type="text" name="director" value="<?php echo $film->getDirector(); ?>" required><br><br>

            <label for="year">Año:</label>
            <input type="number" name="year" value="<?php echo $film->getYear(); ?>" required><br><br>

            <label for="poster">Poster (URL):</label>
            <input type="text" name="poster" value="<?php echo $film->getPoster(); ?>" required><br><br>

            <button type="submit" name="edit">Actualizar</button>
        </form>
    </div>
</body>
</html>

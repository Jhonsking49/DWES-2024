<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Película</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #2c3e50;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
            height: auto;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="text"], input[type="password"], input[type="number"] {
            width: calc(100% - 120px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1a242f;
        }
        .error {
            color: red;
        }
        .logout-link {
            color: #e74c3c;
            text-decoration: none;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
        .actions a {
            margin-right: 10px;
            color: #2980b9;
            text-decoration: none;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
    </head>
<body>
    <div class="container">
        <h2>Bienvenido, <?php echo $_SESSION['user']; ?> | <a href="?logout">Cerrar Sesión</a></h2>
        <h2>Editar Película</h2>
        <?php if (isset($film)): ?>
    <form method="POST" action="FilmController.php?action=update">
        <input type="hidden" name="id" value="<?php echo $film->getId(); ?>">
        <label for="title">Título:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($film->getTitle()); ?>" required><br><br>

        <label for="director">Director:</label>
        <input type="text" name="director" value="<?php echo htmlspecialchars($film->getDirector()); ?>" required><br><br>

        <label for="year">Año:</label>
        <input type="number" name="year" value="<?php echo htmlspecialchars($film->getYear()); ?>" required><br><br>

        <label for="poster">Poster (URL):</label>
        <input type="text" name="poster" value="<?php echo htmlspecialchars($film->getPoster()); ?>" required><br><br>

        <button type="submit" name="edit">Actualizar</button>
        </form>
        <?php else: ?>
            <p class="error">Película no encontrada.</p>
        <?php endif; ?>
    </div>
</body>
</html>

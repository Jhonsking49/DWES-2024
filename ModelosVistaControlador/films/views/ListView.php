<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Películas</title>
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
<body>
<div class="container">
        <h2>Bienvenido, <?php echo $_SESSION['user']; ?> | <a href="?logout">Cerrar Sesión</a></h2>

        <h2>Listado de Películas</h2>

        <!-- Formulario de búsqueda -->
        <form method="POST" action="">
            <input type="text" name="busca" placeholder="Buscar películas...">
            <button type="submit">Buscar</button>
        </form>

        <!-- Botón para agregar nueva película -->
        <button onclick="window.location.href='mainController.php?action=showAddForm'">Agregar Película</button>

        <!-- Tabla de películas -->
        <table>
            <tr>
                <th>Título</th>
                <th>Director</th>
                <th>Año</th>
                <th>Poster</th>
                <th>Acciones</th> <!-- Nueva columna para las acciones -->
            </tr>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?php echo $movie->getTitle(); ?></td>
                    <td><?php echo $movie->getDirector(); ?></td>
                    <td><?php echo $movie->getYear(); ?></td>
                    <td><img src="images/<?php echo $movie->getPoster(); ?>" alt="Poster"></td>
                    <td class="actions">
                        <!-- Botón de editar película -->
                        <button onclick="window.location.href='mainController.php?action=showEditForm&id=<?php echo $movie->getId(); ?>'">Editar</button>
                        </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

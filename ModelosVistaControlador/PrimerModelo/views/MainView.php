<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .login-form, .film-list {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .login-form h2, .film-list h2 {
            text-align: center;
        }
        .film-list ul {
            list-style-type: none;
            padding: 0;
        }
        .film-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php if (!isset($_SESSION['user_id'])): ?>
    <!-- Formulario de login -->
    <div class="login-form">
        <h2>Iniciar sesión</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= $error; ?></p>
        <?php endif; ?>
        <form action="/index.php" method="POST">
            <label for="username">Nombre de usuario:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>

<?php else: ?>
    <!-- Listado de películas -->
    <div class="film-list">
        <h2>Listado de Películas</h2>
        <ul>
            <?php foreach ($films as $film): ?>
                <li>
                    <strong><?= $film->getTitle(); ?></strong><br>
                    Director: <?= $film->getDirector(); ?><br>
                    Año: <?= $film->getYear(); ?><br>
                    <img src="<?= $film->getPoster(); ?>" alt="Poster de <?= $film->getTitle(); ?>" style="width: 100px;"><br>
                    Likes: <?= $film->getLikes(); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <br>
        <form action="/index.php?login=0" method="GET">
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>
<?php endif; ?>

</body>
</html>

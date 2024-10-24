<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="">
            <label for="username">Usuario:</label>
            <input type="text" name="username" required><br><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required><br><br>
            <button type="submit" name="login">Entrar</button>
        </form>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>
</body>
</html>

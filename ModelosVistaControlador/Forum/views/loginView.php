<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --verde-oscuro: #146152;
            --verde-intermedio: #44803F;
            --verde-claro: #B4CF66;
            --amarillo: #FFEC5C;
            --naranja: #FF5A33;
            --blanco: #ffffff;
            --gris: #f5f5f5;
            --texto: #333333;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--gris);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: var(--blanco);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: var(--verde-oscuro);
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--verde-claro);
            border-radius: 5px;
            font-size: 1rem;
            color: var(--texto);
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: var(--verde-intermedio);
            outline: none;
        }

        input[type="submit"] {
            background-color: var(--verde-oscuro);
            color: var(--blanco);
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: var(--verde-intermedio);
        }

        .alert {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: var(--amarillo);
            color: var(--texto);
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION['info'])) {
            echo "<div class='alert'>" . $_SESSION['info'] . "</div>";
            unset($_SESSION['info']); // elimina la variable de sesión
        }
        ?>
        <h1>Inicia sesión</h1>
        <form action="index.php?c=user" method="post">
            <input type="text" id="name" name="username" required placeholder="Nombre de usuario">
            <input type="password" id="password" name="password" required placeholder="Contraseña">
            <input type="submit" value="Iniciar sesión">
        </form>
        <a href="index.php?c=user&register">¿No tienes cuenta? Regístrate</a>
    </div>
</body>

</html>

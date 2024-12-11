<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            background-color: #e8f5e9;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 30px;
        }

        .alert {
            background-color: #f44336;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            width: 80%;
            max-width: 400px;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 1em;
            margin-top: 15px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }

        .register-link {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Iniciar sesión</h1>

        <?php
            if (isset($_SESSION['info'])) {
                echo "<div class='alert'>" . $_SESSION['info'] . "</div>";
                unset($_SESSION['info']); // elimina la variable de sesión
            }
        ?>

        <form action="index.php?c=user" method="post">
            <input type="text" id="name" name="username" required placeholder="Nombre de usuario">
            <input type="password" id="password" name="password" required placeholder="Contraseña">
            <input type="submit" value="Iniciar sesión">
        </form>

        <div class="register-link">
            <a href="index.php?register">Registrarse</a>
        </div>
    </div>
</body>
</html>

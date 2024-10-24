<!DOCTYPE html>
<html lang="es">
    <!-- Inicio de Sesión con PHP y HTML -->
    <!-- Miercoles 25 de septiembre de 2024 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }
        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="login-form">
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>

    <?php
        // Conexión a la base de datos
        $db = new mysqli("localhost", "root", "", "prueba");

        // Comprobamos si el formulario ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtenemos el usuario y la contraseña ingresados
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                if ($password === $row['password']) {
                    echo "<p>Inicio de sesión exitoso. ¡Bienvenido, " . $row['username'] . "!</p>";
                } else {
                    echo "<p class='error'>Contraseña incorrecta.</p>";
                }
            } else {
                echo "<p class='error'>El usuario no existe.</p>";
            }
        }
    ?>

</div>

</body>
</html>

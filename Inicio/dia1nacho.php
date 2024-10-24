<!DOCTYPE html>
<html lang="es">
    <?php
            session_start();
            if (!isset($_SESSION['login'])) {
                $_SESSION['login'] = false;
            }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú con PHP y HTML</title>
    
</head>
<body>

    <nav>
        <a href="?action=home">Home</a>
        <a href="?action=about">About</a>
        <a href="?action=login">Login</a>

    </nav>

    <div class="content">
        <?php

        

        $users['pepe'] = md5("pepe");
        $users['maria'] = md5("maria");
        $users['juan'] = md5("juan");
        $users = md5("Paco");

        $_SESSION['user'] = "luke";

        if (isset($_POST['nombre']) && isset($_POST['password'])) {
            if($users[$_POST['username']] && $users[$_POST['username']] == md5($_POST['password'])) {
                $_SESSION['login'] = true;

            }
        }

        if(isset($_GET['action'])) {
            if($_GET['action'] == 'logout'){
                $_SESSION['login'] = false;
            }
            if($_GET['action'] == 'login' && !isset($info)){
                $content = '
                    <form method="post" action="?action=login">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <input type="submit" value="Login">
                    </form>
                ';
            } else if($_GET['action'] == 'about'){
                $content = '<h1>Sobre nosotros</h1><p>Esta es información sobre nosotros</p>';
            } else {
                $content = '<h1>Bienvenido a la página principal</h1><p>Este es el contenido de la página de inicio</p>';
            }
        }

        $seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'home';

        if ($seccion === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = htmlspecialchars($_POST['nombre']);
            $password = htmlspecialchars($_POST['password']);
            foreach ($usuarios as $usuario) {

            }
            if($nombre === $variablelogin) {
                echo "<h1>Hola, $nombre</h1><p>¡Bienvenido a nuestra página!</p>";
            }
            else {
                echo "<h1>Lamentablemente, no puedes acceder a esta página</h1>";
            }
        }

        if ($_SESSION['login']) {
            echo "Login correcto";
        }
        ?>
    </div>

</body>
</html>

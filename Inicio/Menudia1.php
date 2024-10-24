<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú con PHP y HTML</title>
    
</head>
<body>

    <nav>
        <a href="?seccion=home">Home</a>
        <a href="?seccion=about">About</a>
        <a href="?seccion=login">Login</a>

    </nav>

    <div class="content">
        <?php

        $usuarios['pepe'] = "pepe";
        $usuarios['maria'] = "maria";
        $usuarios['juan'] = "juan";
        $variablelogin = "Paco";
        $secciones = [
            'home' => '<h1>Bienvenido a la página principal</h1><p>Este es el contenido de la página de inicio</p>',
            'about' => '<h1>Sobre nosotros</h1><p>Esta es información sobre nosotros</p>',
            'login' => '
                <h1>Iniciar Sesión</h1>
                <form action="?seccion=login" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Completar</button>
                </form>'
        ];

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

        elseif (array_key_exists($seccion, $secciones)) {
            echo $secciones[$seccion];
        } 
        ?>
    </div>

</body>
</html>

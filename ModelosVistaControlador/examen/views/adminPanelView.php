<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
        }

        header a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }

        header a:hover {
            text-decoration: underline;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        h2, h3 {
            text-align: center;
            color: #4CAF50;
        }

        .alumno, .profesor {
            background-color: #ffffff;
            border-radius: 8px;
            margin: 20px auto;
            padding: 20px;
            width: 80%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .alumno h4, .profesor h4 {
            color: #333;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .alumno p, .profesor p {
            font-size: 1em;
            margin: 10px 0;
        }

        .alumno a, .profesor a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .alumno a:hover, .profesor a:hover {
            background-color: #45a049;
        }

        .alumno, .profesor {
            max-width: 800px;
        }

        a {
            text-align: center;
            display: block;
            padding: 10px;
            margin: 30px auto;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            width: 150px;
            text-align: center;
            border-radius: 5px;
        }

        a:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 768px) {
            .alumno, .profesor {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php?c=user&logout=1">Logout</a>
    </header>
    
    <h1>Panel de administración</h1>

    <h2>Usuarios</h2>

    <h3>Alumnos</h3>
    <?php
    foreach($alumnos as $alumno){
        if($alumno->getRol() == 0){
            $alumnorol = "Alumno";
        } else if($alumno->getRol() == 1){
            $alumnorol = "Profesor";
        } else if($alumno->getRol() == 2){
            $alumnorol = "Super Admin";
        }
        echo "<div class='alumno'>";
        echo "<h4>Nombre: " . $alumno->getUsername() . "</h4>";
        echo "<p>Rol: " . $alumnorol . "</p>";
        echo "<a href='index.php?c=admin&id=" . $alumno->getId() . "&alumprofe'>Convertir alumno a profesor</a>";
        echo "<a href='index.php?c=admin&id=" . $alumno->getId() . "&profealum'>Convertir profesor a alumno</a>";
        echo "</div>";
    }
    ?>

    <h3>Profesores</h3>
    <?php
    foreach($profesores as $profesor){
        if($profesor->getRol() == 1 || $profesor->getRol() == 2){
            $profesorrol = "Profesor";
        }
        echo "<div class='profesor'>";
        echo "<h4>Nombre: " . $profesor->getUsername() . "</h4>";
        echo "<p>Rol: " . $profesorrol . "</p>";
        echo "<a href='index.php?c=admin&id=" . $profesor->getId() . "&alumprofe'>Convertir alumno a profesor</a>";
        echo "<a href='index.php?c=admin&id=" . $profesor->getId() . "&profealum'>Convertir profesor a alumno</a>";
        echo "</div>";
    }
    ?>

    <a href="index.php">Volver</a>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista principal</title>
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

        .welcome {
            font-size: 1.2em;
            color: #ffffff;
            margin-top: 10px;
        }

        .ficha-profesor, .ficha-alumno {
            background-color: #ffffff;
            border-radius: 8px;
            margin: 20px auto;
            padding: 20px;
            width: 80%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .ficha-profesor h4, .ficha-alumno h4 {
            color: #555;
            font-size: 1.2em;
            text-align: center;
        }

        .ficha-profesor p, .ficha-alumno p {
            font-size: 1em;
            margin: 10px 0;
        }

        .ficha-profesor a, .ficha-alumno a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .ficha-profesor a:hover, .ficha-alumno a:hover {
            background-color: #45a049;
        }

        h2, h3 {
            text-align: center;
        }

        .ficha-profesor, .ficha-alumno {
            max-width: 800px;
        }

        @media screen and (max-width: 768px) {
            .ficha-profesor, .ficha-alumno {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php?c=user&logout=1">Logout</a>
        <?php
        if (isset($_SESSION['user'])) {
            echo "<div class='welcome'>Bienvenido, " . $_SESSION['user']->getUsername() . "</div>";
            
            if ($_SESSION['user']->getRol()==2 || $_SESSION['user']->getRol()==1){
                if($_SESSION['user']->getRol()==2){
                    echo "<a href='index.php?c=admin'>Gestionar Usuarios</a>";
                }
                echo "<a href='index.php?c=empresa&newEmpresa'>Dar de alta una nueva empresa</a>";
                echo "<a href='index.php?c=asignacion&newAsignacion'>Dar de alta una nueva asignación</a>";
                echo "<a href='index.php?c=asignacion&verasignaciones'>Ver todas las asignaciones</a>";
                echo "<a href='index.php?c=empresa&verempresas'>Gestionar empresas</a>";
            }
        }
        ?>
    </header>

    <h1>Seguimiento FCT</h1>

    <?php
    if($_SESSION['user']->getRol()==1 || $_SESSION['user']->getRol()==2){
            echo "<h2> Ficha del profesor ".$_SESSION['user']->getUsername()."</h2>";
            echo "<h3>Empresas</h3>";
            $asignacionContador = 0;
            foreach($asignaciones as $asignacion){
                $asignacionContador++;
                if($asignacion->getTutorId() == $_SESSION['user']->getId()){
                    $empresa = EmpresaRepository::getEmpresaById($asignacion->getEmpresaId());
                    $alumno = UserRepository::getUserById($asignacion->getAlumnoId());
                    echo "<div class='ficha-profesor'>";
                    echo "<p>El profesor ".$_SESSION['user']->getUsername()." esta asignado a la empresa ".$empresa->getNombre()."</p>";
                    echo "<p>El alumno del que se tiene que encargar es ".$alumno->getUsername()."</p>";
                    echo "<p>Fecha de inicio: ".$asignacion->getFechaInicio()."</p>";
                    echo "<p>Fecha de fin: ".$asignacion->getFechaFin()."</p>";
                    echo "<a href='index.php?c=asignacion&id=".$asignacion->getId()."&editar'>Editar Asignación</a>";
                    echo "<a href='index.php?c=asignacion&id=".$asignacion->getId()."&eliminar'>Eliminar</a>";
                    echo "</div>";
                }
            }
            if($asignacionContador == 0){
                echo "<div class='ficha-profesor'>";
                echo "<h4>No hay asignaciones del profesor ".$_SESSION['user']->getUsername()."</h4>";
                echo "</div>";
            }
    } elseif($_SESSION['user']->getRol()==0){
        echo "<h2> Ficha del alumno ".$_SESSION['user']->getUsername()."</h2>";
        echo "<h3>Empresas</h3>";
        $asignacionContador = 0;
        foreach($asignaciones as $asignacion){
            $asignacionContador++;
            if($asignacion->getAlumnoId() == $_SESSION['user']->getId()){
                $empresa = EmpresaRepository::getEmpresaById($asignacion->getEmpresaId());
                echo "<div class='ficha-alumno'>";
                echo "<p>El alumno ".$_SESSION['user']->getUsername()." esta asignado a la empresa ".$empresa->getNombre()."</p>";
                echo "<p>Fecha de inicio: ".$asignacion->getFechaInicio()."</p>";
                echo "<p>Fecha de fin: ".$asignacion->getFechaFin()."</p>";
                echo "</div>";
            }
        }
        if($asignacionContador == 0){
            echo "<div class='ficha-alumno'>";
            echo "<h4>No hay asignaciones del alumno ".$_SESSION['user']->getUsername()."</h4>";
            echo "</div>";
        }
    }
    ?>

</body>
</html>

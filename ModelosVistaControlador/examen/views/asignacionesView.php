<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de todas las asignaciones ordenadas por fecha de inicio</title>
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
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 30px;
        }

        .asignaciones {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            width: 80%;
            max-width: 900px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .asignaciones p {
            font-size: 1.1em;
            color: #555;
            margin: 5px 0;
        }

        .asignaciones a {
            color: #4CAF50;
            font-weight: bold;
            text-decoration: none;
            margin-right: 15px;
        }

        .asignaciones a:hover {
            text-decoration: underline;
        }

        .volver {
            margin-top: 30px;
            font-size: 1.1em;
            color: #4CAF50;
            text-decoration: none;
        }

        .volver:hover {
            text-decoration: underline;
        }

        @media screen and (max-width: 768px) {
            .asignaciones {
                width: 100%;
                padding: 15px;
            }

            h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Asignaciones</h1>

        <?php
        // Ordenar las asignaciones por fecha de inicio
        usort($asignaciones, function ($a, $b) {
            return strtotime($a->getFechaInicio()) <=> strtotime($b->getFechaInicio());
        });

        // Mostrar las asignaciones ordenadas
        foreach ($asignaciones as $asignacion) {
            $alumno = UserRepository::getUserById($asignacion->getAlumnoId());
            $empresa = EmpresaRepository::getEmpresaById($asignacion->getEmpresaId());

            echo "<div class='asignaciones'>";
            echo "<p><strong>Alumno:</strong> " . htmlspecialchars($alumno->getUsername() ?? 'Desconocido') . "</p>";
            echo "<p><strong>Empresa:</strong> " . htmlspecialchars($empresa->getNombre() ?? 'Desconocida') . "</p>";
            echo "<p><strong>Fecha de inicio:</strong> " . htmlspecialchars($asignacion->getFechaInicio() ?? 'Sin especificar') . "</p>";
            echo "<p><strong>Fecha de fin:</strong> " . htmlspecialchars($asignacion->getFechaFin() ?? 'Sin especificar') . "</p>";
            echo "<a href='index.php?c=asignacion&id=" . $asignacion->getId() . "&editar'>Editar Asignación</a>";
            echo "<a href='index.php?c=asignacion&id=" . $asignacion->getId() . "&eliminar'>Eliminar</a>";
            echo "</div>";
        }
        ?>

        <a href="index.php" class="volver">Volver</a>
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de todas las empresas</title>
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

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .empresa {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .empresa h2 {
            color: #4CAF50;
            margin: 0 0 10px 0;
        }

        .empresa p {
            font-size: 1em;
            color: #555;
            margin: 5px 0;
        }

        .empresa a {
            color: #4CAF50;
            font-weight: bold;
            text-decoration: none;
            margin-right: 15px;
        }

        .empresa a:hover {
            text-decoration: underline;
        }

        .volver {
            margin-top: 30px;
            font-size: 1em;
            color: #4CAF50;
            text-decoration: none;
        }

        .volver:hover {
            text-decoration: underline;
        }

        @media screen and (max-width: 768px) {
            .empresa {
                width: 100%;
                padding: 15px;
            }

            h2 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Empresas</h2>

        <?php
        foreach($empresas as $empresa){
            echo "<div class='empresa'>";
            echo "<h2>" . $empresa->getNombre() . "</h2>";
            echo "<p><strong>NIF:</strong> " . $empresa->getNif() . "</p>";
            echo "<p><strong>Telefono:</strong> " . $empresa->getTelefono() . "</p>";
            echo "<p><strong>Tutor Laboral:</strong> " . $empresa->getTutorLaboral() . "</p>";
            echo "<p><strong>Email:</strong> " . $empresa->getEmail() . "</p>";
            echo "<a href='index.php?c=empresa&id=" . $empresa->getId() . "&editEmpresa'>Editar</a>";
            echo "<a href='index.php?c=empresa&id=" . $empresa->getId() . "&deleteEmpresa'>Eliminar</a>";
            echo "</div>";
        }
        ?>

        <a href="index.php" class="volver">Volver</a>
    </div>
</body>
</html>

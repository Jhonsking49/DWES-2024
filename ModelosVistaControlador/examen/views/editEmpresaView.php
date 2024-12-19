<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de los datos de la empresa</title>
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

        form {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            width: 80%;
            max-width: 700px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 1.1em;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .volver {
            margin-top: 20px;
            font-size: 1.1em;
            color: #4CAF50;
            text-decoration: none;
        }

        .volver:hover {
            text-decoration: underline;
        }

        @media screen and (max-width: 768px) {
            form {
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
        <h1>Editar datos de la empresa</h1>
        <form action="index.php?c=empresa&editEmpresa&id=<?= $empresa->getId() ?>" method="post">
            <label for="nombreEmpresa">Nombre de la empresa:</label>
            <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($empresa->getNombre() ?? '') ?>" required>

            <label for="nifEmpresa">NIF de la empresa:</label>
            <input type="text" name="nif" id="nif" value="<?= htmlspecialchars($empresa->getNif() ?? '') ?>" required>

            <label for="tutorLaboralEmpresa">Tutor laboral de la empresa:</label>
            <input type="text" name="tutorLaboral" id="tutorLaboral" value="<?= htmlspecialchars($empresa->getTutorLaboral() ?? '') ?>" required>

            <label for="telefonoEmpresa">Teléfono de la empresa:</label>
            <input type="text" name="telefono" id="telefono" value="<?= htmlspecialchars($empresa->getTelefono() ?? '') ?>" required>

            <label for="emailEmpresa">Email de la empresa:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($empresa->getEmail() ?? '') ?>" required>

            <input type="submit" value="Guardar">
        </form>
        <a href="index.php" class="volver">Volver</a>
    </div>
</body>
</html>

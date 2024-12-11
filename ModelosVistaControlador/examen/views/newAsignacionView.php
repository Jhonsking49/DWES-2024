<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista para dar de alta una nueva asignación</title>
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
            margin-top: 80px;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        label {
            font-size: 1em;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        select, input[type="datetime-local"] {
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
            margin-top: 20px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 20px;
        }

        @media screen and (max-width: 768px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alta de Asignación</h1>

        <form action="index.php?c=asignacion&newAsignacion" method="post">
            <div class="form-group">
                <label for="alumno_id">Alumno:</label>
                <select name="alumno" id="alumno_id" required>
                    <option value="">Seleccione un alumno</option>
                    <?php foreach ($alumnos as $alumno): ?>
                        <option value="<?= $alumno->getId() ?>"><?= $alumno->getUsername() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <select name="empresa" id="empresa" required>
                    <option value="">Seleccione una empresa</option>
                    <?php foreach ($empresas as $empresa): ?>
                        <option value="<?= $empresa->getId() ?>"><?= $empresa->getNombre() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha inicio:</label>
                <input type="datetime-local" name="fecha_ini" id="fecha_ini" required>
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha fin:</label>
                <input type="datetime-local" name="fecha_fin" id="fecha_fin" required>
            </div>

            <div class="form-group">
                <label for="tutor_id">Tutor:</label>
                <select name="tutor" id="tutor_id" required>
                    <option value="">Seleccione un tutor</option>
                    <?php foreach ($tutores as $tutor): ?>
                        <option value="<?= $tutor->getId(); ?>"><?= $tutor->getUsername(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="submit" value="Dar de alta">
        </form>

        <a href="index.php">Volver</a>
    </div>
</body>
</html>

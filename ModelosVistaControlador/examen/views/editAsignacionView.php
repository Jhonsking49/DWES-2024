<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de los datos de la asignación</title>
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

        select, input[type="datetime-local"], input[type="submit"] {
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
        <h1>Editar datos de la asignación</h1>
        <form action="index.php?c=asignacion&editar&id=<?= $asignacion->getId() ?>" method="post">
            <label for="alumno_id">Alumno de la asignación:</label>
            <select name="alumno" id="alumno_id" required>
                <option value="<?= htmlspecialchars($asignacion->getAlumnoId() ?? '') ?>">Alumno actual: <?= htmlspecialchars(UserRepository::getUserById($asignacion->getAlumnoId())->getUsername() ?? '') ?></option>
                <?php foreach ($alumnos as $alumno): ?>
                    <option value="<?= $alumno->getId() ?>"><?= $alumno->getUsername() ?></option>
                <?php endforeach; ?>
            </select>

            <label for="empresa">Empresa:</label>
            <select name="empresa" id="empresa" required>
                <option value="<?= htmlspecialchars($asignacion->getEmpresaId() ?? '') ?>">Empresa actual: <?= htmlspecialchars(EmpresaRepository::getEmpresaById($asignacion->getEmpresaId())->getNombre() ?? '') ?></option>
                <?php foreach ($empresas as $empresa): ?>
                    <option value="<?= $empresa->getId() ?>"><?= $empresa->getNombre() ?></option>
                <?php endforeach; ?>
            </select>

            <label for="fecha_inicio">Fecha inicio:</label>
            <input type="datetime-local" name="fecha_ini" id="fecha_ini" value="<?= htmlspecialchars($asignacion->getFechaInicio() ?? '') ?>" required>

            <label for="fecha_fin">Fecha fin:</label>
            <input type="datetime-local" name="fecha_fin" id="fecha_fin" value="<?= htmlspecialchars($asignacion->getFechaFin() ?? '') ?>" required>

            <label for="tutor_id">Tutor:</label>
            <select name="tutor" id="tutor_id" required>
                <option value="<?= htmlspecialchars($asignacion->getTutorId() ?? '') ?>">Tutor actual: <?= htmlspecialchars(UserRepository::getUserById($asignacion->getTutorId())->getUsername() ?? '') ?></option>
                <?php foreach ($tutores as $tutor): ?>
                    <option value="<?= $tutor->getId(); ?>"><?= $tutor->getUsername(); ?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Guardar">
        </form>
        <a href="index.php" class="volver">Volver</a>
    </div>
</body>
</html>

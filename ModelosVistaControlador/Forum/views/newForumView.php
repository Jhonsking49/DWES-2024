<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista para crear un nuevo foro</title>
</head>
<body>
    <h1>Crear un nuevo foro</h1>
    <form action="index.php?c=forum&newForum=1" method="post">
        <input type="text" id="title" name="title" placeholder="Titulo del foro" required><br>
        <input type="text" id="description" name="description" placeholder="Descripción del foro" required><br>
        <select name="type" default="publico">
            <option value="1">Publico</option>
            <option value="2">Privado</option>
        </select><br>
        <input type="submit" value="Crear foro">
    </form>
</body>
</html>
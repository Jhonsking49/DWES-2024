<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista para añadir un nuevo hilo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .forum-header {
            margin-bottom: 20px;
        }
        .forum-header h1 {
            margin: 0;
        }
        .threads {
            margin-top: 20px;
        }
        .thread-item {
            margin-bottom: 10px;
        }
        .thread-item a {
            text-decoration: none;
            color: #007bff;
        }
        .thread-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    $getForumid = $_GET['getForumid'];
    ?>
    <div class="threads">
        <h1>Crear un nuevo hilo</h1>
        <form action="index.php?c=thread&newThread&getForumid=<?php echo $getForumid; ?>" method="post">
            <label for="title">Título del hilo:</label>
            <input type="text" id="title" name="title" required><br><br>
            <label for="content">Contenido del hilo:</label>
            <textarea id="content" name="content" required></textarea><br><br>
            <input type="submit" value="Crear hilo">
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del Foro</title>
    <style>
        :root {
            --verde-oscuro: #146152;
            --verde-intermedio: #44803F;
            --verde-claro: #B4CF66;
            --amarillo: #FFEC5C;
            --naranja: #FF5A33;
            --blanco: #ffffff;
            --gris: #f5f5f5;
            --texto: #333333;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--gris);
            color: var(--texto);
        }

        header {
            background-color: var(--verde-oscuro);
            color: var(--blanco);
            padding: 15px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        .forum-header {
            max-width: 800px;
            margin: 20px auto;
            background-color: var(--blanco);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .forum-header h1 {
            color: var(--verde-oscuro);
            margin-bottom: 10px;
        }

        .forum-header p {
            margin: 5px 0;
        }

        .threads {
            max-width: 800px;
            margin: 20px auto;
            background-color: var(--blanco);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .threads h2 {
            color: var(--verde-oscuro);
            margin-bottom: 20px;
        }

        .threads a {
            display: inline-block;
            background-color: var(--verde-intermedio);
            color: var(--amarillo);
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 15px;
            transition: background-color 0.3s ease;
        }

        .threads a:hover {
            background-color: var(--naranja);
        }

        .thread-item {
            margin: 10px 0;
        }

        .thread-item a {
            color: var(--blanco);
            text-decoration: none;
            font-weight: bold;
        }
        
        .back-button {
            display: block;
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
        }

        .back-button a {
            display: inline-block;
            background-color: var(--amarillo);
            color: var(--texto);
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-button a:hover {
            background-color: var(--naranja);
            color: var(--blanco);
        }
    </style>
</head>

<body>
    <header>
        <h1>Foro</h1>
    </header>
    <div class="forum-header">
        <h1><?php echo ($forum->getForoname()); ?></h1>
        <p><?php echo ($forum->getDescription()); ?></p>
        <p>ID del foro: <?php echo ($forum->getId()); ?></p>
    </div>

    <div class="threads">
        <h2>Hilos en este foro:</h2>
        <a href="index.php?c=thread&newThread=1&getForumid=<?php echo $forum->getId(); ?>">Crear un nuevo hilo</a>
        <?php
        foreach ($threads as $thread) {
            echo "<div class='thread-item'>";
            echo "<a href='index.php?c=thread&getThreadid=" . $thread->getId() . "'>" . $thread->getThreadTitle() . "</a>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="back-button">
        <a href="index.php?c=main">Volver</a>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del Foro</title>
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
    <div class="forum-header">
        <h1><?php echo ($forum->getForoname()); ?></h1>
        <p><?php echo ($forum->getDescription()); ?></p>
        <p><?php echo ($forum->getId()); ?></p>
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
</body>
</html>
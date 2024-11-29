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
        <h1><?php echo htmlspecialchars($forum['foroname']); ?></h1>
        <p><?php echo nl2br(htmlspecialchars($forum['description'])); ?></p>
    </div>

    <div class="threads">
        <h2>Hilos en este foro:</h2>
        <?php if (count($threads) > 0): ?>
            <ul>
                <?php foreach ($threads as $thread): ?>
                    <li class="thread-item">
                        <a href="threadView.php?id=<?php echo $thread['id']; ?>">
                            <?php echo htmlspecialchars($thread['title']); ?>
                        </a>
                        <small>(Creado el: <?php echo htmlspecialchars($thread['created_at']); ?>)</small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No hay hilos en este foro.</p>
        <?php endif; ?>
    </div>
</body>
</html>
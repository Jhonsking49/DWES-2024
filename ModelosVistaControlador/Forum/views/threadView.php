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

    <div class="thread-header">
        <h1><?php echo ($thread->getThreadTitle()); ?></h1>
        <p><?php echo ($thread->getDescription()); ?></p>
        <p><?php echo ($thread->getId()); ?></p>
    </div>

    <div class="thread-comments">
        <h2>Comentarios del hilo</h2>
        <a href="index.php?c=comment&newComment=1&getThreadid=<?php echo $thread->getId(); ?>">Crear un nuevo comentario</a>
        <?php
        if (isset($_POST['newComment'])) {
            $comment = new CommentaryModel(null, $_SESSION['user']->getId(), $_GET['getThreadid'], $_POST['newComment']);
            CommentaryRepository::addCommentary($comment->getId(), $comment->getIdUser(), $comment->getIdThread(), $comment->getComment());
        }
            $comments = CommentaryRepository::getCommentaryByThreadId($thread->getId());
            foreach ($comments as $comment) {
                echo "<div class='comment-item'>";
                echo "<p>" . $comment->getComment() . "</p>";
                echo "<p>Creado por: " . $_SESSION['user']->getUsername() . "</p>";
                
            }
        ?>

        <form method="post">
            <textarea name="newComment" id="comment" cols="30" rows="10"></textarea><br>
            <input type="submit" value="Enviar comentario">
        </form>
</body>
</html>
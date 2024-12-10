<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del Hilo</title>
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

        .thread-header,
        .thread-comments {
            max-width: 800px;
            margin: 20px auto;
            background-color: var(--blanco);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .thread-header h1 {
            color: var(--verde-oscuro);
            margin-bottom: 10px;
        }

        .thread-header p {
            margin: 5px 0;
        }

        .thread-comments h2 {
            color: var(--verde-oscuro);
            margin-bottom: 20px;
        }

        .thread-comments a {
            display: inline-block;
            background-color: var(--verde-intermedio);
            color: var(--blanco);
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 15px;
            transition: background-color 0.3s ease;
        }

        .thread-comments a:hover {
            background-color: var(--naranja);
        }

        .comment-item {
            margin: 15px 0;
            padding: 10px;
            background-color: var(--gris);
            border-radius: 5px;
        }

        .comment-item p {
            margin: 5px 0;
        }

        form {
            margin-top: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--verde-claro);
            border-radius: 5px;
            resize: none;
            font-size: 1rem;
            font-family: 'Arial', sans-serif;
            color: var(--texto);
        }

        textarea:focus {
            border-color: var(--verde-intermedio);
            outline: none;
        }

        input[type="submit"] {
            background-color: var(--verde-oscuro);
            color: var(--blanco);
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: var(--verde-intermedio);
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
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
        <h1>Hilo</h1>
    </header>

    <div class="thread-header">
        <h1><?php echo ($thread->getThreadTitle()); ?></h1>
        <p><?php echo ($thread->getDescription()); ?></p>
        <p>ID del hilo: <?php echo ($thread->getId()); ?></p>
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
            echo "</div>";
        }
        ?>

        <form method="post">
            <textarea name="newComment" id="comment" cols="30" rows="5" placeholder="Escribe tu comentario..."></textarea><br>
            <input type="submit" value="Enviar comentario">
        </form>
    </div>

    <div class="back-button">
        <a href="index.php?c=forum&getForumid=<?php echo $thread->getIdForum(); ?>">Volver</a>
    </div>
</body>

</html>

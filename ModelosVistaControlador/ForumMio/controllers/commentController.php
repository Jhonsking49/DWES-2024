<?php

if (isset($_GET['newComment'])) {
    require_once 'views/newCommentView.php';
    if(isset($_POST['comment']) && isset($_POST['username']) && isset($_POST['date'])) {
        $comment = new CommentaryModel(null, $_POST['username'], $_SESSION['user']->getId(), $_GET['getThreadid'], $_POST['comment']);
        CommentaryRepository::addCommentary( $comment->getIdUser(), $comment->getIdThread(),$comment->getComment());
    }
}

if (isset($_GET['editComment'])) {
    $comment = CommentaryRepository::getCommentaryById($_GET['editComment']);
    $comment->setComment($_POST['comment']);
    CommentaryRepository::updateCommentary($comment->getId(), $comment->getIdUser(), $comment->getIdThread(), $comment->getComment());
}

if (isset($_GET['deleteComment'])) {
    CommentaryRepository::deleteCommentary($_GET['deleteComment']);
}

if (isset($_GET['getComment'])) {
    $comments = CommentaryRepository::getCommentary();
}

if (isset($_GET['getCommentid'])) {
    $comment = CommentaryRepository::getCommentaryById($_GET['getCommentid']);
    // cargamos la vista de los comentarios
    require_once 'views/commentView.php';
    // evitamos que se ejecuten dos vistas a la vez
    exit;
}

?>
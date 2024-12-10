<div>
    <h1>Comentarios del hilo</h1>
    <?php

    $comments = $comments->getCommentaryByThreadId($thread->getId());
    var_dump($comments);

    ?>
</div>
<?php

if (isset($_GET['detail'])) {

    $thread = ThreadRepository::getThreadById($_GET['detail']);
    require_once 'views/threadView.phtml';
    exit();
}

<?php

if (isset($_GET['newThread'])) {
    $thread = new ThreadModel(null, $_POST['title'], $_POST['content'], $_SESSION['user']->getId(), $_GET['getForumid'], date('Y-m-d H:i:s'));
    ThreadRepository::addThread($thread->getThreadTitle(), $thread->getDescription(), $thread->getIdCreator(), $thread->getIdForum(), $thread->getDate());
}

if (isset($_GET['editThread'])) {
    $thread = ThreadRepository::getThreadById($_GET['editThread']);
    $thread->setThreadTitle($_POST['title']);
    $thread->setDescription($_POST['content']);
    ThreadRepository::updateThread($thread->getId(), $thread->getThreadTitle(), $thread->getDescription(), $thread->getIdCreator(), $thread->getIdForum(), $thread->getDate());
}

if (isset($_GET['deleteThread'])) {
    ThreadRepository::deleteThread($_GET['deleteThread']);
}

if (isset($_GET['getThread'])) {
    $threads = ThreadRepository::getThread();
}

if (isset($_GET['getThreadid'])) {
    $thread = ThreadRepository::getThreadById($_GET['getThreadid']);
    require_once 'views/threadView.php';
}


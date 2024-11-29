<?php

if (isset($_GET['newForum'])) {
    $forum = new ForumModel(null, $_POST['foroname'], $_POST['description'], $_POST['type'], $_SESSION['user']->getId());
    ForumRepository::addForum($forum->getForoname(), $forum->getDescription(), $forum->getType(), $forum->getIdCreator());
}

if (isset($_GET['editForum'])) {
    $forum = ForumRepository::getForumById($_GET['editForum']);
    $forum->setForoname($_POST['foroname']);
    $forum->setDescription($_POST['description']);
    $forum->setType($_POST['type']);
    ForumRepository::updateForum($forum->getId(), $forum->getForoname(), $forum->getDescription(), $forum->getType(), $forum->getIdCreator());
}

if (isset($_GET['deleteForum'])) {
    ForumRepository::deleteForum($_GET['deleteForum']);
}

if (isset($_GET['getForum'])) {
    $forums = ForumRepository::getForum();
}

if (isset($_GET['getForumid'])) {
    $forum = ForumRepository::getForumById($_GET['getForumid']);
    require_once 'views/forumView.php';
    
}
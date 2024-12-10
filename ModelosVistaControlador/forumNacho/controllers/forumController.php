<?php

if (isset($_GET['detail'])) {
    $forum = ForumRepository::getForumById($_GET['detail']);
    require_once 'views/forumView.phtml';
    exit();
}

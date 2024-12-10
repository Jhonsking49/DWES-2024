<?php

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}

if (isset($_GET['login'])) {
    require_once 'views/loginView.phtml';
    exit();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = UserRepository::login($_POST['username'], $_POST['password']);
    if ($user) $_SESSION['user'] = $user;
}

if (isset($_GET['admin'])) {
    $users = UserRepository::getUsers();
    require_once 'views/adminView.phtml';
    exit();
}

if (isset($_POST['rol'])) {
    UserRepository::updateRol($_POST['user'], $_POST['rol']);
    header('Location: index.php?c=user&admin');
}

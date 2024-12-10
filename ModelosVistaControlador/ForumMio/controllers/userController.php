<?php

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = UserRepository::login($_POST['username'], $_POST['password']);
    if ($user) $_SESSION['user'] = $user;
}

if (isset($_GET['register'])) {
    require_once 'views/registerView.php';
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
        $user = UserRepository::register($_POST['username'], $_POST['password'], $_POST['email'], $_FILES['avatar']);
        if ($user) $_SESSION['user'] = $user;
    }
    exit;
}


?>
<?php

if (isset($_GET['adminPanelView'])) {
    $users = UserRepository::getUsers();
    include("views/AdminView.php");
    die;
}

if (isset($_POST['changeRole'])) {
    $userId = $_POST['userId'];
    $newRole = $_POST['newRole']; 

    UserRepository::updateUserRole($userId, $newRole);
    include("views/AdminView.php");
    die;
} 

?>
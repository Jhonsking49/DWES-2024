<?php
    if (isset($_POST["username"])) {
        if (isset($_POST["register"])) {
            UserRepository::createNewUser($_POST);
        }
        $_SESSION["username"] = UserRepository::userLogin($_POST);

        require_once("controllers/ProductController.php");
        include("views/MainView.php");
        die;
    }

    if (isset($_GET["newUser"])) {
        include("views/SigninView.php");
        die;
    }

    include("views/LoginView.php");

?>
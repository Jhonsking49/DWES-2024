<?php
    //Modelos a cargar
    require_once 'models/UserModel.php';
    require_once 'models/ForumModel.php';
    require_once 'models/ThreadModel.php';
    require_once 'models/CommentaryModel.php';

    // Repositorios a cargar
    require_once 'models/UserRepository.php';
    require_once 'models/ForumRepository.php';
    require_once 'models/ThreadRepository.php'; 
    require_once 'models/CommentaryRepository.php';


    session_start();

    //Funcion para redireccionar las peticiones GET dependiendo del controlador

    if (isset($_GET['c'])) {
        require_once('controllers/' . $_GET['c'] . 'Controller.php');
    }

    if (!isset($_SESSION['user']))
        // cargar la vista
        require_once 'views/loginView.php';
    else {
        $forums = ForumRepository::getForum();
        require_once 'views/mainView.php';
    }

        
?>
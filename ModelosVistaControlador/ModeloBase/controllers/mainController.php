<?php
    //Modelos a cargar
    require_once 'models/UserModel.php';
    //require_once 'models/Elemento.php';

    // Repositorios a cargar
    require_once 'models/UserRepository.php';
    //require_once 'models/ElementoRepository.php';

    session_start();

    //Funcion para redireccionar las peticiones GET dependiendo del controlador
    /* 
    if (isset($_GET['c'])) {
        require_once('controllers/' . $_GET['c'] . 'Controller.php');
    }
    */

    if (!isset($_SESSION['user']))
        // cargar la vista
        require_once 'views/loginView.phtml';
    else {
        //$elementos = ElementoRepository::getElemento();
        require_once 'views/mainView.phtml';
    }

?>
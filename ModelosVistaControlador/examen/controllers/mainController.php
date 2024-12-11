<?php

require_once "models/UserModel.php";
require_once "models/EmpresaModel.php";
require_once "models/AsignacionModel.php";

require_once "models/UserRepository.php";
require_once "models/EmpresaRepository.php";
require_once "models/AsignacionRepository.php";

session_start();

if(isset($_GET['c'])){
    require_once "controllers/" . $_GET['c'] . "Controller.php";
}

if(!isset($_SESSION['info'])){
    if(isset($_GET['register'])){
        require_once "views/registerView.php";
        exit();
    }
    require_once "views/loginView.php";
} else {
    $empresas = EmpresaRepository::getEmpresas();
    $alumnos = UserRepository::getAlumnos();
    $profesores = UserRepository::getProfesores();
    $asignaciones = AsignacionRepository::getAsignacion();
    
    require_once "views/mainView.php";
}
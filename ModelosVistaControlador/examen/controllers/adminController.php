<?php

$alumnos = UserRepository::getAlumnos();
$profesores = UserRepository::getProfesores();
$asignaciones = AsignacionRepository::getAsignacion();
require_once "views/adminPanelView.php";
exit();

if(isset($_GET['alumprofe'])){
    $user = UserRepository::getUserById($_GET['id']);
    foreach($asignaciones as $asignacion){
        // si el alumno es el que esta asignado mostrar un mensaje de error
        if($asignacion->getAlumnoId() == $user->getId()){
            $_SESSION['info'] = "El alumno ya esta asignado a la empresa";
        }
    }
    UserRepository::updateRol($_GET['id'], 1);
}

if(isset($_GET['profealum'])){
    $user = UserRepository::getUserById($_GET['id']);
    UserRepository::updateRol($user->getId(), 0);
}
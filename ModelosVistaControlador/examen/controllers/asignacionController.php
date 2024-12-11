<?php

if(isset($_GET['newAsignacion'])){
    $alumnos = UserRepository::getAlumnos();
    $empresas = EmpresaRepository::getEmpresas();
    $tutores = UserRepository::getProfesores();
    require_once "views/newAsignacionView.php";
    if(isset($_POST['alumno']) && isset($_POST['empresa']) && isset($_POST['fecha_ini']) && isset($_POST['fecha_fin']) && isset($_POST['tutor'])){
        $asignacion = new AsignacionModel(null, $_POST['alumno'], $_POST['empresa'], $_POST['fecha_ini'], $_POST['fecha_fin'], $_POST['tutor']);
        AsignacionRepository::addAsignacion($asignacion->getAlumnoId(), $asignacion->getEmpresaId(), $asignacion->getFechaInicio(), $asignacion->getFechaFin(), $asignacion->getTutorId());
    }
    exit();
}

if(isset($_GET['editar'])){
    $asignacion = AsignacionRepository::getAsignacionById($_GET['id']);
    $alumnos = UserRepository::getAlumnos();
    $empresas = EmpresaRepository::getEmpresas();
    $tutores = UserRepository::getProfesores();
    require_once "views/editAsignacionView.php";
    if(isset($_POST['alumno']) && isset($_POST['empresa']) && isset($_POST['fecha_ini']) && isset($_POST['fecha_fin']) && isset($_POST['tutor'])){
        $asignacion = new AsignacionModel($asignacion->getId(), $_POST['alumno'], $_POST['empresa'], $_POST['fecha_ini'], $_POST['fecha_fin'], $_POST['tutor']);
        AsignacionRepository::updateAsignacion($asignacion->getId(), $asignacion->getAlumnoId(), $asignacion->getEmpresaId(), $asignacion->getFechaInicio(), $asignacion->getFechaFin(), $asignacion->getTutorId());
    }
    exit();
}

if(isset($_GET['eliminar'])){
    AsignacionRepository::deleteAsignacion($_GET['id']);
}

if(isset($_GET['verasignaciones'])){
    $asignaciones = AsignacionRepository::getAsignacion();
    require_once "views/asignacionesView.php";
    exit();
}
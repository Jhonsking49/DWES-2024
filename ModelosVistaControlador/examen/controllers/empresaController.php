<?php

if(isset($_GET['newEmpresa'])){
    require_once 'views/newEmpresaView.php';
    if(isset($_POST['nombre']) && isset($_POST['nif']) && isset($_POST['telefono']) && isset($_POST['tutorLaboral']) && isset($_POST['email'])){
        $empresa = new EmpresaModel(null, $_POST['nombre'], $_POST['nif'], $_POST['telefono'], $_POST['tutorLaboral'], $_POST['email']);
        EmpresaRepository::addEmpresa($empresa->getNombre(), $empresa->getNif(), $empresa->getTelefono(), $empresa->getTutorLaboral(), $empresa->getEmail());
    }
    exit();
}

if(isset($_GET['editEmpresa'])){
    $empresa = EmpresaRepository::getEmpresaById($_GET['id']);
    require_once "views/editEmpresaView.php";
    if(isset($_POST['nombre']) && isset($_POST['nif']) && isset($_POST['telefono']) && isset($_POST['tutorLaboral']) && isset($_POST['email'])){
        $empresa = new EmpresaModel($empresa->getId(), $_GET['nombre'], $_GET['nif'], $_GET['telefono'], $_GET['tutorLaboral'], $_GET['email']);
        EmpresaRepository::updateEmpresa($empresa->getId(), $empresa->getNombre(), $empresa->getNif(), $empresa->getTelefono(), $empresa->getTutorLaboral(), $empresa->getEmail());
    }
    exit();
}

if(isset($_GET['deleteEmpresa'])){
    EmpresaRepository::deleteEmpresa($_GET['id']);
}

if(isset($_GET['verempresas'])){
    $empresas = EmpresaRepository::getEmpresas();
    require_once "views/empresasView.php";
    exit();
}
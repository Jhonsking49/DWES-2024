<?php

require_once "models/PokemonModel.php";
require_once "models/PokedexModel.php";
require_once "models/UserModel.php";
require_once "models/PokedexUserModel.php";

require_once "models/PokemonRepository.php";
require_once "models/PokedexRepository.php";
require_once "models/UserRepository.php";
require_once "models/PokedexUserRepository.php";

session_start();

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


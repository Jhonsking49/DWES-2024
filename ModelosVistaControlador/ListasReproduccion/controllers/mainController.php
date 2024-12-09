<?php
//cargamos el modelo
require_once('models/UserModel.php');
require_once('models/ListModel.php');
require_once('models/SongModel.php');

require_once('models/UserRepository.php');
require_once('models/ListRepository.php');
require_once('models/SongRepository.php');

session_start();



if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php'); //Coge el controlador que toca segun lo que reciba la variable get
} else require_once('controllers/listController.php');

// cargar la vista
require_once("views/ListView.php");

?>
<?php
//cargamos el modelo
require_once('models/Movie.php');
require_once('models/MovieRepository.php');


if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php');
} else require_once('controllers/movieController.php');

// cargar la vista
require_once("views/ListView.phtml");

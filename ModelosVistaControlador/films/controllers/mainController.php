<?php
require_once("controllers/UserController.php");
require_once("controllers/FilmController.php");

// Iniciar sesión
session_start();

// Manejar el inicio de sesión o cierre de sesión
UserController::login();
UserController::logout();

// Si no hay usuario autenticado, mostrar el formulario de inicio de sesión
if (!isset($_SESSION['user'])) {
    include("views/LoginView.php");
    exit();
}

// Manejar las acciones
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'showAddForm':
            // Redirigir a FilmController para mostrar el formulario de agregar película
            FilmController::showAddForm();
            break;

        case 'add':
            // Redirigir a FilmController para agregar la película
            include("views/AddView.php");
            FilmController::addFilm();
            break;

        case 'showEditForm':
            if (isset($_GET['id'])) {
                // Redirigir a FilmController para mostrar el formulario de edición
                FilmController::showEditForm($_GET['id']);
            }
            break;

        case 'edit':
            // Redirigir a FilmController para editar la película
            include("views/EditView.php");
            FilmController::editFilm();
            break;

        default:
            // Si no hay acción específica, mostrar el listado de películas
            $movies = FilmController::showMovies();
            include("views/ListView.php");
            break;
    }
} else {
    // Si no hay acción en la URL, mostrar el listado de películas
    $movies = FilmController::showMovies();
    include("views/ListView.php");
}
?>

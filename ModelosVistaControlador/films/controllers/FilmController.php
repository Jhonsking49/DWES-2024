<?php
require_once("models/FilmModel.php");
require_once("models/FilmRepository.php");

class FilmController {
    // Mostrar el formulario de agregar película
    public static function showAddForm() {
        include("views/AddView.php");
    }

    // Manejar la lógica de agregar una película
    public static function addFilm() {
        if (isset($_POST['title']) && isset($_POST['director']) && isset($_POST['year']) && isset($_POST['poster'])) {
            $film = new FilmModel([
                'title' => $_POST['title'],
                'director' => $_POST['director'],
                'year' => $_POST['year'],
                'poster' => $_POST['poster']
            ]);

            FilmRepository::addMovie($film);
            header("Location: mainController.php");  // Redirigir de nuevo al listado después de agregar
        }
    }

    // Mostrar el formulario de edición de película
    public static function showEditForm($id) {
        $film = FilmRepository::getMovieById($id);
        include("views/EditView.php");
    }

    // Manejar la lógica de editar una película
    public static function editFilm() {
        if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['director']) && isset($_POST['year']) && isset($_POST['poster'])) {
            $film = new FilmModel([
                'id' => $_POST['id'],
                'title' => $_POST['title'],
                'director' => $_POST['director'],
                'year' => $_POST['year'],
                'poster' => $_POST['poster']
            ]);

            FilmRepository::updateMovie($film);
            header("Location: mainController.php");  // Redirigir de nuevo al listado después de editar
        }
    }
    public static function showMovies() {
        if (isset($_POST['busca'])) {
            $movies = FilmRepository::getMovieByTitle($_POST['busca']);
        } else {
            $movies = FilmRepository::getMovies();
        }
        return $movies;
    }
}
/*
// Manejar las acciones del controlador según el parámetro `action`
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'showAddForm':
            FilmController::showAddForm();
            break;
        case 'add':
            FilmController::addFilm();
            break;
        case 'showEditForm':
            if (isset($_GET['id'])) {
                FilmController::showEditForm($_GET['id']);
            }
            break;
        case 'edit':
            FilmController::editFilm();
            break;
        default:
            break;
    }
}
 */
?>





<?php
require_once('helpers/fileHelper.php');


if (isset($_GET['newMovie'])) {
    require_once('views/newMovie.phtml');
    die();
}
if (isset($_GET['del'])) {
}


if (isset($_POST['addMovie'])) {
    if (isset($_POST['title'])  && isset($_POST['year'])) {
        if (isset($_FILES['poster']['name'])) {
            fileHelper::fileHandler($_FILES['poster']['tmp_name'], 'public/img/' . $_FILES['poster']['name']);
        }
        $title = $_POST['title'];
        $poster = $_FILES['poster']['name'];;
        $year = $_POST['year'];
        MovieRepository::addMovie($title, $poster, $year);
    }
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $movies = MovieRepository::getMoviesByTitle($search);
} else {
    $movies = MovieRepository::getMovies();
}

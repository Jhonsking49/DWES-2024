<?php
require_once("models/FilmModel.php");

class FilmRepository {
    // Método para agregar película
    public static function addMovie($film) {
        $db = Conectar::conexion();
        $query = $db->prepare("INSERT INTO films (title, director, year, poster) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssis", $film->getTitle(), $film->getDirector(), $film->getYear(), $film->getPoster());
        $query->execute();
    }

    // Método para obtener película por ID
    public static function getMovieById($id) {
        $db = Conectar::conexion();
        $query = $db->prepare("SELECT * FROM films WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        return new FilmModel($result->fetch_assoc());
    }

    // Método para actualizar película
    public static function updateMovie($film) {
        $db = Conectar::conexion();
        $query = $db->prepare("UPDATE films SET title = ?, director = ?, year = ?, poster = ? WHERE id = ?");
        $query->bind_param("ssisi", $film->getTitle(), $film->getDirector(), $film->getYear(), $film->getPoster(), $film->getId());
        $query->execute();
    }

	public static function getMovies() {
        $db = Conectar::conexion();
        $movies = array();
        $result = $db->query("SELECT * FROM films");
        while ($row = $result->fetch_assoc()) {
            $movies[] = new FilmModel($row);
        }
        return $movies;
    }

    public static function getMovieByTitle($t) {
        $db = Conectar::conexion();
        $movies = array();
        $result = $db->query("SELECT * FROM films WHERE title LIKE '%".$t."%'");
        while ($row = $result->fetch_assoc()) {
            $movies[] = new FilmModel($row);
        }
        return $movies;
    }
}
?>

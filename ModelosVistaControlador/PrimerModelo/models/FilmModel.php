<?php
class FilmModel {
    private $id;
    private $title;
    private $director;
    private $year;
    private $poster;
    private $likes;

    // Métodos para manejar películas

    public function setFilmData($title, $director, $year, $poster, $likes, $id = null) {
        $this->id = $id["id"];
        $this->title = $title["title"];
        $this->director = $director["director"];
        $this->year = $year["year"];
        $this->poster = $poster["poster"];
        $this->likes = $likes["likes"];
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDirector() {
        return $this->director;
    }

    public function getYear() {
        return $this->year;
    }

    public function getPoster() {
        return $this->poster;
    }

    public function getLikes() {
        return $this->likes;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDirector($director) {
        $this->director = $director;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setPoster($poster) {
        $this->poster = $poster;
    }

    public function setLikes($likes) {
        $this->likes = $likes;
    }
}
?>

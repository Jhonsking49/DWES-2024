<?php

class MovieRepository
{

    public static function getMoviesByTitle($search)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM movie where title LIKE '%" . $search . "%'";
        $result = $db->query($q);

        while ($row = $result->fetch_assoc()) {
            $movies[] = new Movie($row['title'], $row['year'], $row['poster']);
        }

        return $movies;
    }
    public static function getMovies()
    {
        $db = Connection::connect();
        $q = "SELECT * FROM movie";
        $result = $db->query($q);

        while ($row = $result->fetch_assoc()) {
            $movies[] = new Movie($row['title'], $row['year'], $row['poster']);
        }

        return $movies;
    }

    public static function addMovie($title, $year, $poster)
    {
        $db = Connection::connect();
        $q = "INSERT INTO movie (title, year, poster) VALUES ('$title', '$year', '$poster')";
        $db->query($q);
        return $db->insert_id;
    }
}

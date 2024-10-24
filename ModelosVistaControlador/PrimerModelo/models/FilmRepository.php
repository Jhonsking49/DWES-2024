<?php
class FilmRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllFilms() {
        $query = $this->db->query("SELECT * FROM films");
        $films = $query->fetch_all(MYSQLI_ASSOC);

        return array_map(function($filmData) {
            return new FilmModel(
                $filmData['title'], 
                $filmData['director'], 
                $filmData['year'], 
                $filmData['poster'], 
                $filmData['id']
            );
        }, $films);
    }

    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM films WHERE id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        $filmData = $query->get_result()->fetch_assoc();

        if ($filmData) {
            return new FilmModel(
                $filmData['title'], 
                $filmData['director'], 
                $filmData['year'], 
                $filmData['poster'], 
                $filmData['id']
            );
        }

        return null;
    }

    public function add(FilmModel $film) {
        $query = $this->db->prepare("INSERT INTO films (title, director, year, poster) VALUES (?, ?, ?, ?)");
        $query->bind_param(
            'ssis', 
            $film->getTitle(), 
            $film->getDirector(), 
            $film->getYear(), 
            $film->getPoster()
        );
        return $query->execute();
    }

    public function update(FilmModel $film) {
        $query = $this->db->prepare("UPDATE films SET title = ?, director = ?, year = ?, poster = ? WHERE id = ?");
        $query->bind_param(
            'ssisi', 
            $film->getTitle(), 
            $film->getDirector(), 
            $film->getYear(), 
            $film->getPoster(), 
            $film->getId()
        );
        return $query->execute();
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM films WHERE id = ?");
        $query->bind_param('i', $id);
        return $query->execute();
    }

    public function search($term) {
        $term = "%$term%";
        $query = $this->db->prepare("SELECT * FROM films WHERE title LIKE ? OR director LIKE ? OR year LIKE ?");
        $query->bind_param('sss', $term, $term, $term);
        $query->execute();
        $films = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return array_map(function($filmData) {
            return new FilmModel(
                $filmData['title'], 
                $filmData['director'], 
                $filmData['year'], 
                $filmData['poster'], 
                $filmData['id']
            );
        }, $films);
    }
}
?>

<?php

class SongRepository {
    
    public function getAllSongs() {
        $db = Connection::connect();
        $sql = "SELECT * FROM songs";
        $result = $db->query($sql);
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = new SongModel($row['id'], $row['title'], $row['author'], $row['duration'], $row['mp3'], $row['owner']);
        }
        return $songs;
    }

    public function getSongById($id) {
        $db = Connection::connect();
        $sql = "SELECT * FROM songs WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new SongModel($row['id'], $row['title'], $row['author'], $row['duration'], $row['mp3'], $row['owner']);
    }

    public function createSong($title, $author, $duration, $mp3, $owner) {
        $db = Connection::connect();
        $sql = "INSERT INTO songs (title, author, duration, mp3, owner) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssi", $title, $author, $duration, $mp3, $owner);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new SongModel($row['id'], $row['title'], $row['author'], $row['duration'], $row['mp3'], $row['owner']);
    }

    public function deleteSong($id) {
        $db = Connection::connect();
        $sql = "DELETE FROM songs WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new SongModel($row['id'], $row['title'], $row['author'], $row['duration'], $row['mp3'], $row['owner']);
    }

    public function getSongsByPlaylist($playlistId) {
        $db = Connection::connect();
        $sql = "SELECT s.* FROM songs s, playlists p WHERE ps.owner, ps.playlistId = $playlistId";
        $result = $db->query($sql);
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = new SongModel($row['id'], $row['title'], $row['author'], $row['duration'], $row['mp3'], $row['owner']);
        }
        return $songs;
    }
}
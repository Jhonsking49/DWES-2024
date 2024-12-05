<?php

class PlaylistRepository {
    
    public function getAllPlaylists() {
        $db = Connection::connect();
        $sql = "SELECT * FROM playlists";
        $result = $db->query($sql);
        $playlists = array();
        while ($row = $result->fetch_assoc()) {
            $playlists[] = new PlaylistModel($row['id'], $row['title'], $row['owner']);
        }
        return $playlists;
    }

    public function getPlaylistById($id) {
        $db = Connection::connect();
        $sql = "SELECT * FROM playlists WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new PlaylistModel($row['id'], $row['title'], $row['owner']);
    }

    public function createPlaylist($title, $owner) {
        $db = Connection::connect();
        $sql = "INSERT INTO playlists (title, owner) VALUES (?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $title, $owner);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new PlaylistModel($row['id'], $row['title'], $row['owner']);
    }

    public function deletePlaylist($id) {
        $db = Connection::connect();
        $sql = "DELETE FROM playlists WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new PlaylistModel($row['id'], $row['title'], $row['owner']);
    }

    public function getPlaylistsByUser($userId) {
        $db = Connection::connect();
        $sql = "SELECT p.* FROM playlists p, playlists_users pus WHERE pus.playlistId = p.id AND pus.owner = ?";
        $result = $db->query($sql);
        $playlists = array();
        while ($row = $result->fetch_assoc()) {
            $playlists[] = new PlaylistModel($row['id'], $row['title'], $row['owner']);
        }
        return $playlists;
    }
}
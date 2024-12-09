<?php

class SongRepository
{
    public static function getAllSongsByLista($id_lista){
        $db = Connection::connect();
        $q = "SELECT * FROM canciones WHERE id_lista = $id_lista";
        $result = $db->query($q);
        $canciones = [];
        while($row = $result->fetch_assoc()){
            $canciones[] = new cancion($row['id_cancion'], $row['titulo'], $row['autor'], $row['duracion'], $row['id_lista']);
        }
        return $canciones;
    }

    public static function createSong($id_lista, $titulo, $autor, $duracion){
        $db = Connection::connect();
        $q = "INSERT INTO canciones (titulo, autor, duracion, id_lista) VALUES ('$titulo', '$autor', $duracion, $id_lista)";
        return $db->query($q);
    }

    public static function searchSongs($query) {
        $db = Connection::connect();
        $q = "SELECT * FROM canciones WHERE titulo LIKE '%$query%' OR autor LIKE '%$query%'";
        $result = $db->query($q);
        $canciones = [];
        while ($row = $result->fetch_assoc()) {
            $canciones[] = new cancion($row['id_cancion'], $row['titulo'], $row['autor'], $row['duracion'], $row['id_lista']);
        }
        return $canciones;
    }

    public static function getAllSongs() {
        $db = Connection::connect();
        $q = "SELECT * FROM canciones";
        $result = $db->query($q);
        $canciones = [];
        while ($row = $result->fetch_assoc()) {
            $canciones[] = new cancion($row['id_cancion'], $row['titulo'], $row['autor'], $row['duracion'], $row['id_lista']);
        }
        return $canciones;
    }
}



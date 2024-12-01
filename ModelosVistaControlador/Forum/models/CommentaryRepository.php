<?php

class CommentaryRepository
{

    public static function getCommentaryById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM comentaries WHERE id = $id";
        $result = $connect->query($query);
        if ($commentary = $result->fetch_assoc()) {
            return new CommentaryModel($commentary['id'], $commentary['idUser'], $commentary['idThread'], $commentary['comment']);
        } else return false;
    }

    public static function addCommentary($idUser, $idThread, $comment)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO comentaries (id, idUser, idThread, comment) VALUES (NULL, '$idUser', '$idThread', '$comment')";
        $result = $connect->query($query);
        if ($result) {
            return new CommentaryModel(null, $idUser, $idThread, $comment);
        } else return false;
    }

    public static function updateCommentary($id, $comment, $idUser, $idThread)
    {
        $connect = Connection::connect();
        $query = "UPDATE comentaries SET comment = '$comment', idUser = '$idUser', idThread = '$idThread' WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return new CommentaryModel($id, $idUser, $idThread, $comment);
        } else return false;
    }

    public static function deleteCommentary($id)
    {
        $connect = Connection::connect();
        $query = "DELETE FROM comentaries WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return true;
        } else return false;
    }

    public static function getCommentary()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM comentaries";
        $result = $connect->query($query);
        $commentaries = array();
        while ($commentary = $result->fetch_assoc()) {
            $commentaries[] = new CommentaryModel($commentary['id'], $commentary['comment'], $commentary['idUser'], $commentary['idThread']);
        }
        return $commentaries;
    }

    public static function getCommentaryByThreadId($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM comentaries WHERE idThread = $id";
        $result = $connect->query($query);
        $commentaries = array();
        while ($commentary = $result->fetch_assoc()) {
            $commentaries[] = new CommentaryModel($commentary['id'], $commentary['comment'], $commentary['idUser'], $commentary['idThread']);
        }
        return $commentaries;
    }

}
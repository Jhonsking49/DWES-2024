<?php

class CommentaryRepository
{

    public static function getCommentaryById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM commentary WHERE id = $id";
        $result = $connect->query($query);
        if ($commentary = $result->fetch_assoc()) {
            return new CommentaryModel($commentary['id'], $commentary['comment'], $commentary['idUser'], $commentary['idThread'], $commentary['date']);
        } else return false;
    }

    public static function addCommentary($comment, $idUser, $idThread, $date)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO commentary (id, comment, idUser, idThread, date) VALUES (NULL, '$comment', '$idUser', '$idThread', '$date')";
        $result = $connect->query($query);
        if ($result) {
            return new CommentaryModel(null, $comment, $idUser, $idThread, $date);
        } else return false;
    }

    public static function updateCommentary($id, $comment, $idUser, $idThread, $date)
    {
        $connect = Connection::connect();
        $query = "UPDATE commentary SET comment = '$comment', idUser = '$idUser', idThread = '$idThread', date = '$date' WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return new CommentaryModel($id, $comment, $idUser, $idThread, $date);
        } else return false;
    }

    public static function deleteCommentary($id)
    {
        $connect = Connection::connect();
        $query = "DELETE FROM commentary WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return true;
        } else return false;
    }

    public static function getCommentary()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM commentary";
        $result = $connect->query($query);
        $commentaries = array();
        while ($commentary = $result->fetch_assoc()) {
            $commentaries[] = new CommentaryModel($commentary['id'], $commentary['comment'], $commentary['idUser'], $commentary['idThread'], $commentary['date']);
        }
        return $commentaries;
    }

}
<?php

class ForumRepository
{

    public static function getForumById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM forum WHERE id = $id";
        $result = $connect->query($query);
        if ($forum = $result->fetch_assoc()) {
            return new ForumModel($forum['id'], $forum['foroname'], $forum['description'], $forum['type'], $forum['idCreator']);
        } else return false;
    }

    public static function addForum($foroname, $description, $type, $idCreator)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO forum (id, foroname, description, type, idCreator) VALUES (NULL, '$foroname', '$description', '$type', '$idCreator')";
        $result = $connect->query($query);
        if ($result) {
            return new ForumModel(null, $foroname, $description, $type, $idCreator);
        } else return false;
    }

    public static function updateForum($id, $foroname, $description, $type, $idCreator)
    {
        $connect = Connection::connect();
        $query = "UPDATE forum SET foroname = '$foroname', description = '$description', type = '$type', idCreator = '$idCreator' WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return new ForumModel($id, $foroname, $description, $type, $idCreator);
        } else return false;
    }

    public static function deleteForum($id)
    {
        $connect = Connection::connect();
        $query = "DELETE FROM forum WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return true;
        } else return false;
    }

    public static function getForum()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM forum";
        $result = $connect->query($query);
        $forums = array();
        while ($forum = $result->fetch_assoc()) {
            $forums[] = new ForumModel($forum['id'], $forum['foroname'], $forum['description'], $forum['type'], $forum['idCreator']);
        }
        return $forums;
    }

}
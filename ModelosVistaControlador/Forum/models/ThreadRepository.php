<?php

class ThreadRepository
{

    public static function getThreadById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM threads WHERE id = $id";
        $result = $connect->query($query);
        if ($thread = $result->fetch_assoc()) {
            return new ThreadModel($thread['id'], $thread['threadTitle'], $thread['description'], $thread['idCreator'], $thread['idForum'], $thread['date']);
        } else return false;
    }

    public static function addThread($threadTitle, $description, $idCreator, $idForum, $date)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO threads (id, threadTitle, description, idCreator, idForum, date) VALUES (NULL, '$threadTitle', '$description', '$idCreator', '$idForum', '$date')";
        $result = $connect->query($query);
        if ($result) {
            return new ThreadModel(null, $threadTitle, $description, $idCreator, $idForum, $date);
        } else return false;
    }

    public static function updateThread($id, $threadTitle, $description, $idCreator, $idForum, $date)
    {
        $connect = Connection::connect();
        $query = "UPDATE thread SET threadTitle = '$threadTitle', description = '$description', idCreator = '$idCreator', idForum = '$idForum', date = '$date' WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return new ThreadModel($id, $threadTitle, $description, $idCreator, $idForum, $date);
        } else return false;
    }

    public static function deleteThread($id)
    {
        $connect = Connection::connect();
        $query = "DELETE FROM threads WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return true;
        } else return false;
    }

    public static function getThread()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM threads";
        $result = $connect->query($query);
        $threads = array();
        while ($thread = $result->fetch_assoc()) {
            $threads[] = new ThreadModel($thread['id'], $thread['threadTitle'], $thread['description'], $thread['idCreator'], $thread['idForum'], $thread['date']);
        }
        return $threads;
    }

    public static function getThreadByForumId($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM threads WHERE idForum = $id";
        $result = $connect->query($query);
        $threads = array();
        while ($thread = $result->fetch_assoc()) {
            $threads[] = new ThreadModel($thread['id'], $thread['threadTitle'], $thread['description'], $thread['idCreator'], $thread['idForum'], $thread['date']);
        }
        return $threads;
    }

}
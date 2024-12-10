<?php

class ForumRepository
{

    public static function getForums()
    {

        $connection = Connection::connect();
        $query = "SELECT * FROM forums";
        $result = $connection->query($query);
        $forums = [];

        while ($forum = $result->fetch_assoc()) {
            $forums[] = new Forum($forum['id'], $forum['name'], $forum['visible']);
        }

        return $forums;
    }

    public static function getForumById($id)
    {
        $connection = Connection::connect();
        $query = "SELECT * FROM forums WHERE id = $id";
        $result = $connection->query($query);
        if ($forum = $result->fetch_assoc()) {
            return new Forum($forum['id'], $forum['name'], $forum['visible']);
        } else return null;
    }

    public static function createForum($name, $visible)
    {
        $connection = Connection::connect();
        $query = "INSERT INTO forums (name, visible) VALUES ('$name', $visible)";
        $connection->query($query);
        return $connection->insert_id;
    }
}

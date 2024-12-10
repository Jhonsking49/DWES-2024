<?php

class ThreadRepository
{
    public static function getThreadById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM threads WHERE id = $id";
        $result = $connect->query($query);
        if ($thread = $result->fetch_assoc()) {
            return new Thread($thread['id'], $thread['title'], $thread['user_id'],  $thread['forum_id'], $thread['content']);
        }
    }

    public static function getThreadsByForumId($forumId)
    {

        $connect = Connection::connect();
        $query = "SELECT * FROM threads WHERE forum_id = $forumId";
        $result = $connect->query($query);
        $threads = [];
        while ($thread = $result->fetch_assoc()) {
            $threads[] = new Thread($thread['id'], $thread['title'], $thread['user_id'],  $thread['forum_id'], $thread['content']);
        }
        return $threads;
    }

    public static function createThread($forumId, $name, $text)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO threads (user_id, forum_id, title, content, created_at) VALUES (" . $_SESSION['user']->getId() . ", $forumId, '$name', '$text', NOW())";
        $connect->query($query);
        return $connect->insert_id;
    }
}

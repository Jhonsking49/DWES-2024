<?php


class MessageRepository
{
    public static function getMessageById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM messages WHERE id = $id";
        $result = $connect->query($query);
        if ($message = $result->fetch_assoc()) {
            return new Message($message['id'], $message['user_id'], $message['content'], $message['created_at']);
        }
    }

    public static function addMessage($text, $threadId)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO messages (content, user_id, thread_id, message_date) VALUES ('$text', " . $_SESSION['user']->getId() . ", $threadId, NOW())";
        $connect->query($query);
        return $connect->insert_id;
    }

    public static function getMessagesByThreadId($threadId)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM messages WHERE thread_id = $threadId ORDER BY message_date ASC";
        $result = $connect->query($query);
        $messages = [];
        while ($message = $result->fetch_assoc()) {
            $messages[] = new Message($message['id'], $message['user_id'], $message['content'], $message['message_date']);
        }
        return $messages;
    }
}

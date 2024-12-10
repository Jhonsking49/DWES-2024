<?php

class Thread
{

    private $id;
    private $name;
    private $author;
    private $forum;
    private $text;
    private $messages = array();

    public function __construct($id, $name, $author, $forum, $text)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->forum = $forum;
        $this->text = $text;
        $this->messages = MessageRepository::getMessagesByThreadId($this->id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAuthor()
    {
        return UserRepository::getUserById($this->author);
    }

    public function getForum()
    {
        return ForumRepository::getForumById($this->forum);
    }

    public function getText()
    {
        return $this->text;
    }

    public function getMessages()
    {
        return $this->messages;
    }
}

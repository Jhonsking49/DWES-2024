<?php

class Message
{

    private $id;
    private $text;
    private $datetime;
    private $author;

    public function __construct($id, $author, $text, $datetime)
    {
        $this->id = $id;
        $this->text = $text;
        $this->datetime = $datetime;
        $this->author = $author;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getDatetime()
    {
        return $this->datetime;
    }

    public function getAuthor()
    {
        return UserRepository::getUserById($this->author);
    }
}

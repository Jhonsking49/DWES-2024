<?php

class Forum
{

    private $id;
    private $name;
    private $visible;
    private $threads = array();

    public function __construct($id, $name, $visible)
    {
        $this->id = $id;
        $this->name = $name;
        $this->visible = $visible;
        $this->threads = ThreadRepository::getThreadsByForumId($this->id);
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getVisible()
    {
        return $this->visible;
    }
    public function getThreads()
    {
        return $this->threads;
    }
}

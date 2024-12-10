<?php

class ThreadModel
{
    private $id;
    private $threadTitle;
    private $description;
    private $idCreator;
    private $idForum;
    private $date;

    public function __construct($id, $threadTitle, $description, $idCreator, $idForum, $date)
    {
        $this->id = $id;
        $this->threadTitle = $threadTitle;
        $this->description = $description;
        $this->idCreator = $idCreator;
        $this->idForum = $idForum;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getThreadTitle()
    {
        return $this->threadTitle;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getIdCreator()
    {
        return $this->idCreator;
    }

    public function getIdForum()
    {
        return $this->idForum;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setThreadTitle($threadTitle)
    {
        $this->threadTitle = $threadTitle;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setIdCreator($idCreator)
    {
        $this->idCreator = $idCreator;
    }

    public function setIdForum($idForum)
    {
        $this->idForum = $idForum;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}
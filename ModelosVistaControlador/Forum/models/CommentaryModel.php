<?php

class CommentaryModel
{
    private $id;
    private $comment;
    private $idUser;
    private $idThread;
    private $date;

    public function __construct($id, $comment, $idUser, $idThread, $date)
    {
        $this->id = $id;
        $this->comment = $comment;
        $this->idUser = $idUser;
        $this->idThread = $idThread;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getIdThread()
    {
        return $this->idThread;
    }

    public function getDate()
    {
        return $this->date;
    }
}
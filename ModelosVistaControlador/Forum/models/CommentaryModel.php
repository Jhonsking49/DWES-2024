<?php

class CommentaryModel
{
    private $id;
    private $comment;
    private $idUser;
    private $idThread;

    public function __construct($id, $comment, $idUser, $idThread)
    {
        $this->id = $id;
        $this->comment = $comment;
        $this->idUser = $idUser;
        $this->idThread = $idThread;
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

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setIdThread($idThread)
    {
        $this->idThread = $idThread;
    }
}
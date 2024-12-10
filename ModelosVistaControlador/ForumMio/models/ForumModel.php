<?php

class ForumModel
{
    private $id;
    private $foroname;
    private $description;
    private $type;
    private $idCreator;

    public function __construct($id, $foroname, $description, $type, $idCreator)
    {
        $this->id = $id;
        $this->foroname = $foroname;
        $this->description = $description;
        $this->type = $type;
        $this->idCreator = $idCreator;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getForoname()
    {
        return $this->foroname;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getIdCreator()
    {
        return $this->idCreator;
    }

    public function setForoname($foroname)
    {
        $this->foroname = $foroname;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setIdCreator($idCreator)
    {
        $this->idCreator = $idCreator;
    }
}
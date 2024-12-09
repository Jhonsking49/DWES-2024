<?php

class UserModel
{
    private $id;
    private $username;
    private $pokedex_id;

    public function __construct($id, $username, $pokedex_id)
    {
        $this->id = $id;
        $this->username = $username;
        $this->pokedex_id = $pokedex_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPokedexId()
    {
        return $this->pokedex_id;
    }
}
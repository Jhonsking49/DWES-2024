<?php

class PokedexModel
{
    private $id;
    private $user_id;
    // array de pokemones que guarda el id de los pokemones de este pokedex
    private $pokemones;

    public function __construct($id, $user_id)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->pokemones = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getPokemones()
    {
        return $this->pokemones;
    }
    
}
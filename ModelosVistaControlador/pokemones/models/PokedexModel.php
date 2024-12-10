<?php

class PokedexModel
{
    private $id;
    // array de pokemones que guarda el id de los pokemones de este pokedex
    private $pokemones;

    public function __construct($id, $user_id)
    {
        $this->id = $id;
        $this->pokemones = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPokemones()
    {
        return $this->pokemones;
    }
    
}
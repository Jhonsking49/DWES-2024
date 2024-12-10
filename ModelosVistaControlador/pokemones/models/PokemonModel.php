<?php

class PokemonModel
{
    private $id;
    private $name;
    private $attack;
    private $defense;


    public function __construct($id, $name, $attack, $defense)
    {
        $this->id = $id;
        $this->name = $name;
        $this->attack = $attack;
        $this->defense = $defense;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function getDefense()
    {
        return $this->defense;
    }


}
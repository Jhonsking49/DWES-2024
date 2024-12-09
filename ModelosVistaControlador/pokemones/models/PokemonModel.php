<?php

class PokemonModel
{
    private $id;
    private $name;
    private $description;
    private $type;
    private $attack;
    private $defense;


    public function __construct($id, $name, $description, $type, $attack, $defense)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
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

    public function getDescription()
    {
        return $this->description;
    }

    public function getType()
    {
        return $this->type;
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
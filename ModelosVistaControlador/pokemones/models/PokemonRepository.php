<?php

class PokemonRepository
{
    public static function getAll()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM pokemones";
        $result = $connect->query($query);
        $pokemones = array();
        while ($pokemon = $result->fetch_object())
        {
            $pokemones[] = new PokemonModel($pokemon->id, $pokemon->name, $pokemon->description, $pokemon->type, $pokemon->attack, $pokemon->defense);
        }
        return $pokemones;
    }

    public static function getById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM pokemones WHERE id = '$id'";
        $result = $connect->query($query);
        $pokemon = $result->fetch_object();
        return new PokemonModel($pokemon->id, $pokemon->name, $pokemon->description, $pokemon->type, $pokemon->attack, $pokemon->defense);
    }
}
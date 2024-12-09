<?php

class PokedexRepository
{
    public static function getAll()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM pokedex";
        $result = $connect->query($query);
        $pokedexes = array();
        while ($pokedex = $result->fetch_object())
        {
            $pokedexes[] = new PokedexModel($pokedex->id, $pokedex->user_id);
        }
        return $pokedexes;
    }

    public static function getById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM pokedex WHERE id = '$id'";
        $result = $connect->query($query);
        $pokedex = $result->fetch_object();
        return new PokedexModel($pokedex->id, $pokedex->user_id);
    }

    // funcion para añadir un pokemon a la pokedex
    public static function addPokemon($pokedex_id, $pokemon_id)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO pokedex_pokemones (pokedex_id, pokemon_id) VALUES ('$pokedex_id', '$pokemon_id')";
        $connect->query($query);
    }

    // funcion para eliminar un pokemon de la pokedex
    public static function removePokemon($pokedex_id, $pokemon_id)
    {
        $connect = Connection::connect();
        $query = "DELETE FROM pokedex_pokemones WHERE pokedex_id = '$pokedex_id' AND pokemon_id = '$pokemon_id'";
        $connect->query($query);
    }

    // funcion para obtener todos los pokemones de una pokedex
    public static function getPokemones($user_id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM pokemones WHERE user_id = '$user_id'";
        $result = $connect->query($query);
        $pokemones = array();
        while ($pokemon = $result->fetch_object())
        {
            $pokemones[] = new PokemonModel($pokemon->id, $pokemon->name, $pokemon->description, $pokemon->type, $pokemon->attack, $pokemon->defense);
        }
        return $pokemones;
    }
}
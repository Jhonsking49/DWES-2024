<?php

class lista{
    private $id_lista;
    private $nombreLista;
    private $id_cancion;
    private $id_user;

    public function __construct($id_lista, $nombreLista, $id_cancion, $id_user) {
        $this->id_lista = $id_lista;
        $this->nombreLista = $nombreLista;
        $this->id_cancion = $id_cancion;
        $this->id_user = $id_user;
    }

    public function getId(){
        return $this->id_lista;
    }

    public function getNombre(){
        return $this->nombreLista;
    }

    public function getCancion(){
        return $this->id_cancion;
    }

    public function getUser(){
        return $this->id_user;
    }
}
?>
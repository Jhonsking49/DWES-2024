<?php

class EmpresaModel
{
    private $id;
    private $nombre;
    private $nif;
    private $tutorLaboral;
    private $telefono;
    private $email;

    public function __construct($id, $nombre, $nif, $tutorLaboral, $telefono, $email)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->nif = $nif;
        $this->tutorLaboral = $tutorLaboral;
        $this->telefono = $telefono;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getNif()
    {
        return $this->nif;
    }

    public function getTutorLaboral()
    {
        return $this->tutorLaboral;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setNombre(){
        
    }
}
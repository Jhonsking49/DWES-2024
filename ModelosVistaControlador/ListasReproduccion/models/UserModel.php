<?php

class UserModel
{

    private $id_user;
    private $nombre;
    private $admin;

    public function __construct($id_user, $nombre, $admin) {
        $this->id_user = $id_user;
        $this->nombre = $nombre;
        $this->admin = $admin;
    }
    
    public function getId(){
        return $this->id_user;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function esAdmin(){
        return $this->admin;
    }
}


?>
<?php

class UserModel
{
    private $id;
    private $username;
    private $avatar;
    private $rol;

    public function __construct($id, $username, $avatar, $password, $rol)
    {
        $this->id = $id;
        $this->username = $username;
        $this->avatar = $avatar;
        $this->rol = $rol;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getRol()
    {
        return $this->rol;
    }
}
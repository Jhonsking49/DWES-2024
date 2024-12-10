<?php

class UserModel
{
    private $id;
    private $username;
    private $email;
    private $avatar;
    private $rol;

    public function __construct($id, $username, $rol, $email, $avatar)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
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

    public function getEmail()
    {
        return $this->email;
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
<?php

class UserRepository
{

    public static function login($username, $password)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM usuario WHERE username = '$username' AND password = md5('$password')";
        $result = $connect->query($query);
        if ($user = $result->fetch_assoc()) {

            return new User($user['id'], $user['username'], $user['rol']);
        } else $_SESSION['info'] = "ERROR";
        return false;
    }

    public static function getUserById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM usuario WHERE id = $id";
        $result = $connect->query($query);
        if ($user = $result->fetch_assoc()) {
            return new User($user['id'], $user['username'], $user['rol']);
        } else return false;
    }

    public static function register($username, $password)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO usuario (id, username, password, rol) VALUES (NULL, '$username', md5('$password'), 1)";
        $result = $connect->query($query);
        if ($result) {
            return new User(null, $username, 1);
        } else return false;
    }
}

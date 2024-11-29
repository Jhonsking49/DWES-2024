<?php

class UserRepository
{

    public static function login($username, $password)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM users WHERE username = '$username' AND password = md5('$password')";
        $result = $connect->query($query);
        if ($user = $result->fetch_assoc()) {

            return new UserModel($user['id'], $user['username'], $user['email'], $user['avatar'], $user['rol']);
        } else $_SESSION['info'] = "ERROR";
        return false;
    }

    public static function getUserById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM users WHERE id = $id";
        $result = $connect->query($query);
        if ($user = $result->fetch_assoc()) {
            return new UserModel($user['id'], $user['username'], $user['rol']);
        } else return false;
    }

    public static function register($username, $password)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO users (id, username, password, email, avatar, rol) VALUES (NULL, '$username', md5('$password'), '', '', 1)";
        $result = $connect->query($query);
        if ($result) {
            return new UserModel(null, $username, 1);
        } else return false;
    }
}

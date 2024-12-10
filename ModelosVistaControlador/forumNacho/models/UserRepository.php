<?php

class UserRepository
{

    public static function login($username, $password)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM users WHERE rol>=0 and username = '$username' AND password = md5('$password')";
        $result = $connect->query($query);
        if ($user = $result->fetch_assoc()) {

            return new User($user['id'], $user['username'], $user['rol']);
        } else $_SESSION['info'] = "ERROR";
        return false;
    }

    public static function getUserById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM users WHERE id = $id";
        $result = $connect->query($query);
        if ($user = $result->fetch_assoc()) {
            return new User($user['id'], $user['username'], $user['rol']);
        } else return false;
    }

    public static function getUsers()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM users";
        $result = $connect->query($query);
        $users = [];
        while ($user = $result->fetch_assoc()) {
            $users[] = new User($user['id'], $user['username'], $user['rol']);
        }
        return $users;
    }

    public static function updateRol($userId, $rol)
    {
        $connect = Connection::connect();
        $query = "UPDATE users SET rol = '$rol' WHERE id = $userId";
        $connect->query($query);
        return $connect->affected_rows > 0;
    }
}

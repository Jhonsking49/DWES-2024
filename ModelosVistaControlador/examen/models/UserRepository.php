<?php

class UserRepository
{

    public static function login($username, $password)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM user WHERE username = '$username' AND password = md5('$password')";
        $result = $connect->query($query);
        if ($user = $result->fetch_assoc()) {

            return new User($user['id'], $user['username'], $user['rol']);
        } else $_SESSION['info'] = "ERROR";
        return false;
    }

    public static function getUserById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM user WHERE id = $id";
        $result = $connect->query($query);
        if ($user = $result->fetch_assoc()) {
            return new User($user['id'], $user['username'], $user['rol']);
        } else return false;
    }

    public static function getAlumnos()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM user WHERE rol = 0";
        $result = $connect->query($query);
        $alumnos = array();
        while ($fila = $result->fetch_assoc()) {
            $alumnos[] = new User($fila['id'], $fila['username'], $fila['rol']);
        }
        return $alumnos;
    }

    public static function getProfesores()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM user WHERE rol = 1 || rol = 2";
        $result = $connect->query($query);
        $profesores = array();
        while ($fila = $result->fetch_assoc()) {
            $profesores[] = new User($fila['id'], $fila['username'], $fila['rol']);
        }
        return $profesores;
    }

    public static function getSuperAdmins()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM user WHERE rol = 2";
        $result = $connect->query($query);
        $superAdmins = array();
        while ($fila = $result->fetch_assoc()) {
            $superAdmins[] = new User($fila['id'], $fila['username'], $fila['rol']);
        }
        return $superAdmins;
    }

    public static function register($username, $password)
    {
        $connect = Connection::connect();
        if(!isset($username) || !isset($password)) {
            throw new Error("ERROR: No se han obtenido los datos requeridos");
            return false;
        } else {
            $query = "INSERT INTO user (username, password, rol) VALUES ('$username', md5('$password'), 0)";
            $result = $connect->query($query);
            if ($result) {
                return true;
            } else {
                throw new Error("ERROR: No se ha podido registrar al usuario");
                return false;
            }
        }
    }

    public static function updateRol($userId, $rol)
    {
        $connect = Connection::connect();
        $query = "UPDATE users SET rol = '$rol' WHERE id = $userId";
        $connect->query($query);
        return $connect->affected_rows > 0;
    }
}

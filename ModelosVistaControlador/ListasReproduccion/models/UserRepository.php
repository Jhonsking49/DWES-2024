<?php

class UserRepository
{
    public static function getUsers(){
        $db = Connection::connect();
        $query = $db->query('SELECT * FROM users');
        $users = [];
        while($row = $query->fetch_assoc()){
            $users[] = new User($row['id_user'], $row['nombre'], $row['admin']);
        }
        return $users;
    }

    public static function getUserById($id){
        $db = Connection::connect();
        $query = $db->query("SELECT * FROM users WHERE id_user = $id");
        $row = $query->fetch_assoc();
        return new User($row['id_user'], $row['nombre'], $row['admin']);
    }

    public static function register($username, $password) {
        $db = Connection::connect();
        $q = "INSERT INTO users (nombre, password) VALUES ('$username', '$password')";
        if ($db->query($q)) {
            return $db->insert_id;
        } else {
            // Si hay un error, lo mostramos
            echo "Error en la consulta: " . $db->error;
        }
    }

    public static function login($username, $password) {
        $db = Connection::connect();
        $q = "SELECT * FROM users WHERE nombre = '$username' AND password = '$password'";
        $result = $db->query($q);
        
        if ($row = $result->fetch_assoc()) {
            // Crear objeto User siempre
            $user = new User($row['id_user'], $row['nombre'], $row['admin']);
            return $user; // Devolver objeto
        }
        return false;
    }
}



?>
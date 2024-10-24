<?php

class UserRepository {

    private $db;

    public function __construct($db) {
        $this->db = Conectar::conexion();
    }

    public function add($user) {
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user->getUserName(), $hashedPassword);
        $stmt->execute();
    }
    

    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->get_result();
        $users = [];
        while ($row = $result->fetch_object()) {
            $users[] = $row;
        }
        return $users;
    }

    public function getUserName ($id) {
        $stmt = $this->db->prepare("SELECT username FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_object();
            return $user->username;
        } else {
            return null;
        }
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_object();
            return $user;
        } else {
            return null;
        }
    }
    
    //Actualizar usuario
    public function update($user) {
        $stmt = $this->db->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?"); 
        $stmt->bind_param("ssi", $user->getUserName(), $user->getPassword(), $user->getId());
        $stmt->execute();
        return $user;
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

    }

    public function userLogin($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_object();
            
            // Verificar la contraseña usando password_verify
            if (password_verify($password, $user->password)) {
                // Devolver el usuario si la contraseña es correcta
                return $user;
            }
        }
        return null; // Si el usuario no existe o la contraseña no coincide
    }
    

    // Obtener el usuario actual
    public function getCurrentUser() {
        if (isset($_SESSION["username"])) {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $_SESSION["username"]);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $user = $result->fetch_object();
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public static function userLogOut() {
        unset($_SESSION["username"]);
    }
}
?>

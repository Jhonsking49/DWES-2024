<?php

class UserRepository {
    public static function getUsers(){
        $db=Conectar::conexion();
        $users= array();
        $result= $db->query("SELECT * FROM users");
        while($row=$result->fetch_assoc()){
                $users[]=new UserModel($row);
            }
        return $users;
    }

    public static function userLogin ($username, $password){
        $db=Conectar::conexion();
         $query = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $query->bind_param('ss', $username, $password);
        $query->execute();
        $result = $query->get_result();

        // Si hay un usuario que coincide con las credenciales, devolver los datos del usuario
        if ($result->num_rows > 0) {
            return $result->fetch_object(); // Devuelve un objeto de usuario
        } else {
            return false; // Si no se encuentra el usuario
        }
    }

    public static function userLogout() {
        // Destruir sesión
        session_destroy();
    }
}

?>
<?php
require_once("models/UserRepository.php");

class UserController {
    // Manejar el inicio de sesión
    public static function login() {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Intentar iniciar sesión
            $user = UserRepository::userLogin($username, $password);

            if ($user !== null) {
                // Guardar el usuario en la sesión
                $_SESSION['user'] = $user->username;
                header("Location: index.php"); // Redirigir después de iniciar sesión
            } else {
                // Error en las credenciales
                $error = "Usuario o contraseña incorrectos";
                include("views/LoginView.php"); // Mostrar la vista de login con el error
            }
            exit();
        }
    }

    // Manejar cierre de sesión
    public static function logout() {
        if (isset($_GET['logout'])) {
            UserRepository::userLogout();
            session_destroy();
            header("Location: index.php");
            exit();
        }
    }
}
?>

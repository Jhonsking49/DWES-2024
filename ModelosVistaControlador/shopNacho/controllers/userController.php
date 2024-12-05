<?php
require_once "models/User.php";

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login($username, $password) {
        $user = $this->userModel->authenticate($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: index.php");
    }
}
?>

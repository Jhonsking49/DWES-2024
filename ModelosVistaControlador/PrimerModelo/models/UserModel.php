<?php
class UserModel {
    private $id;
    private $username;
    private $password;

    public function __construct($username, $password, $id = null) {
        $this->id = $id["id"];
        $this->username = $username["username"];
        $this->password = $password["password"];
    }

    public function getId() {
        return $this->id;
    }

    public function getUserName() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setUserName($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}
?>

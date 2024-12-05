<?php
require_once("models/UserModel.php");

class UserRepository {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=shop', 'root', ''); // Ajusta las credenciales
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM user");
        $users = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new UserModel($row['username'], $row['password'], $row['role'], $row['id']);
        }
        return $users;
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new UserModel($row['username'], $row['password'], $row['role'], $row['id']);
    }

    public function save(UserModel $user) {
        $stmt = $this->db->prepare("INSERT INTO user (username, password, role) VALUES (?, ?, ?)");
        $stmt->execute([$user->getUsername(), $user->getPassword(), $user->getRole()]);
    }

    public function update(UserModel $user) {
        $stmt = $this->db->prepare("UPDATE user SET username = ?, password = ?, role = ? WHERE id = ?");
        $stmt->execute([$user->getUsername(), $user->getPassword(), $user->getRole(), $user->getId()]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM user WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>

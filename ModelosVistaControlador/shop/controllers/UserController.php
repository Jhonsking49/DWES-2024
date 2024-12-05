<?php
require_once("models/UserModel.php");
require_once("models/UserRepository.php");

class UserController {
    private $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function index() {
        $users = $this->userRepository->getAll();
        include("views/UserListView.php");
    }

    public function create($data) {
        $user = new UserModel($data["username"], $data["password"], $data["role"]);
        $this->userRepository->save($user);
        header("Location: /index.php?main=user");
    }

    public function edit($id, $data) {
        $user = $this->userRepository->getById($id);
        $user->setUsername($data["username"]);
        $user->setPassword($data["password"]);
        $user->setRole($data["role"]);
        $this->userRepository->update($user);
        header("Location: /index.php?main=user");
    }

    public function delete($id) {
        $this->userRepository->delete($id);
        header("Location: /index.php?main=user");
    }
}
?>

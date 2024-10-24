<?php
require_once "models/FilmModel.php";
require_once "models/FilmRepository.php";
require_once "models/UserModel.php";
require_once "models/UserRepository.php";

class MainController {
    private $filmRepository;
    private $userRepository;
    private $userModel;
    private $filmModel;

    public function __construct($db) {
        session_start(); // Iniciar la sesión
        $this->filmRepository = new FilmRepository($db);
        $this->userRepository = new UserRepository($db);
        $this->userModel = new UserModel();
        $this->filmModel = new FilmModel();
    }

    // Mostrar la vista principal
    public function index() {
        // Verificar si hay una sesión iniciada
        if (!isset($_SESSION['user_id'])) {
            $this->login(); // Mostrar la vista de login si no hay sesión
        } else {
            // Mostrar la vista principal si hay sesión iniciada
            $filmData = $this->filmRepository->getAllFilms();
            $films = [];

            // Crear objetos FilmModel a partir de los datos
            foreach ($filmData as $data) {
                $films[] = new FilmModel(
                    $data['title'],
                    $data['director'],
                    $data['year'],
                    $data['poster'],
                    $data['likes']
                );
            }

            require_once "./views/MainView.php"; // Mostrar la vista principal
        }
    }

    // Función para el login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userRepository->userLogin($username, $password);

            if ($user) {
                // Guardar el ID del usuario en la sesión
                $_SESSION['user_id'] = $user->id;
                header("Location: /ModelosVistaControlador/PrimerModelo/index.php");
            } else {
                // Si la autenticación falla
                $error = "Usuario o contraseña incorrectos";
                require_once "./views/MainView.php";
            }
        } else {
            // Si no es un POST, mostrar la vista de login
            require_once "./views/MainView.php";
        }
    }

    // Función para cerrar sesión
    public function logout() {
        // Destruir la sesión y redirigir al login
        session_destroy();
        header("Location: /index.php");
    }

    // Crear una película
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $director = $_POST['director'];
            $year = $_POST['year'];
            $poster = $_POST['poster'];
            $user = $this->userRepository->getCurrentUser();
            $film = new FilmModel($title, $director, $year, $poster, $user->id);
            $this->filmRepository->add($film);
            header("Location: /index.php");
        }
    }

    // Mostrar detalles de una película
    public function showFilm($id) {
        $film = $this->filmRepository->getById($id);
        if ($film) {
            require_once './views/films/index.php';
        } else {
            echo "Película no encontrada";
        }
    }
}
?>

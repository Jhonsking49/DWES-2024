<?php
session_start();

// Conexión a la base de datos
$db = new mysqli("localhost", "root", "", "prueba");

// Verificar la conexión
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

// Inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para validar el usuario
    $query = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $query->bind_param('ss', $username, $password);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}

// Cerrar sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Eliminar película
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Eliminar película de la base de datos
    $query = $db->prepare("DELETE FROM films WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Editar película
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $director = $_POST['director'];
    $year = $_POST['year'];
    $poster = $_POST['poster'];
    $likes = $_POST['likes'];

    // Actualizar la película
    $query = $db->prepare("UPDATE films SET title = ?, director = ?, year = ?, poster = ? WHERE id = ?");
    $query->bind_param('ssisi', $title, $director, $year, $poster, $id);
    $query->execute();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Agregar película
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $title = $_POST['title'];
    $director = $_POST['director'];
    $year = $_POST['year'];
    $poster = $_POST['poster'];
    $likes = 1;

    // Insertar la película en la base de datos
    $query = $db->prepare("INSERT INTO films (title, director, year, poster, likes) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param('ssisi', $title, $director, $year, $poster, $likes); // Aquí está el cambio
    $query->execute();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


// Obtener películas para el listado
$films = $db->query("SELECT * FROM films");

// Buscar películas
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search = $_POST['search'];

    // Buscar películas en la base de datos
    $query = $db->prepare("SELECT * FROM films WHERE title LIKE ? OR director LIKE ? OR year LIKE ?");
    $query->bind_param('sss', $search, $search, $search);
    $query->execute();
    $result = $query->get_result();

    // Mostrar resultados de la búsqueda
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $films= $db->query("SELECT * FROM films WHERE id = $row[id]");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Películas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #2c3e50;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
            height: auto;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="text"], input[type="password"], input[type="number"] {
            width: calc(100% - 120px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1a242f;
        }
        .error {
            color: red;
        }
        .logout-link {
            color: #e74c3c;
            text-decoration: none;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
        .actions a {
            margin-right: 10px;
            color: #2980b9;
            text-decoration: none;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!isset($_SESSION['username'])): ?>
            <!-- Mostrar formulario de inicio de sesión -->
            <h2>Iniciar Sesión</h2>
            <form method="POST" action="">
                <label for="username">Usuario:</label>
                <input type="text" name="username" required><br><br>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required><br><br>
                <button type="submit" name="login">Entrar</button>
            </form>
            <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <?php else: ?>
            <!-- Mostrar contenido de películas si está autenticado -->
            <h2>Bienvenido, <?php echo $_SESSION['username']; ?> | <a class="logout-link" href="?logout">Cerrar Sesión</a></h2>

            <h2>Listado de Películas</h2>
            <h1>Buscador de Películas</h1>
            <form action="?search" method="POST">
                <input type="text" name="search" placeholder="Buscar...">
                <button type="submit">Buscar</button>
            </form>
            <table>
                <tr>
                    <th>Título</th>
                    <th>Director</th>
                    <th>Año</th>
                    <th>Poster</th>
                    <th>Likes</th>
                    <th>Acciones</th>
                </tr>
                <?php while ($row = $films->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['director']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><img src="<?php echo "images/".$row['poster']; ?>" alt="Poster"></td>
                        <td class="likes">
                            
                        </td>
                        <td class="actions">
                            <a href="?edit=<?php echo $row['id']; ?>">Editar</a>
                            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta película?');">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <h2>Agregar Nueva Película</h2>
            <form method="POST" action="">
                <label for="title">Título:</label>
                <input type="text" name="title" required><br><br>

                <label for="director">Director:</label>
                <input type="text" name="director" required><br><br>

                <label for="year">Año:</label>
                <input type="number" name="year" required><br><br>

                <label for="poster">Poster (URL):</label>
                <input type="text" name="poster" required><br><br>

                <button type="submit" name="add">Agregar Película</button>
            </form>

            <?php
            // Mostrar formulario de edición si se ha seleccionado una película para editar
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];

                // Obtener datos de la película
                $query = $db->prepare("SELECT * FROM films WHERE id = ?");
                $query->bind_param('i', $id);
                $query->execute();
                $result = $query->get_result();
                $film = $result->fetch_assoc();
            ?>
                <h2>Editar Película</h2>
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $film['id']; ?>">
                    <label for="title">Título:</label>
                    <input type="text" name="title" value="<?php echo $film['title']; ?>" required><br><br>

                    <label for="director">Director:</label>
                    <input type="text" name="director" value="<?php echo $film['director']; ?>" required><br><br>

                    <label for="year">Año:</label>
                    <input type="number" name="year" value="<?php echo $film['year']; ?>" required><br><br>

                    <label for="poster">Poster (URL):</label>
                    <input type="text" name="poster" value="<?php echo $film['poster']; ?>" required><br><br>

                    <button type="submit" name="edit">Actualizar</button>
                </form>
            <?php } ?>
        <?php endif; ?>
    </div>
</body>
</html>

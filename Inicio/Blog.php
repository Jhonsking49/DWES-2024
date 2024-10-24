<?php
session_start();

// Conexión a la base de datos
$db = new mysqli("localhost", "root", "", "blog");

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
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['id'];  // Guardamos el ID del usuario en la sesión
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}


// Verifica que el ID de usuario esté en la sesión
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = null;
}

// Cerrar sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Eliminar articulo
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Eliminar artículo de la base de datos
    $query = $db->prepare("DELETE FROM articles WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Crear un nuevo artículo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_article'])) {
    // Verificar que el usuario esté autenticado antes de crear el artículo
    if ($user_id !== null) {
        $title = $_POST['title'];
        $text = $_POST['text'];
        $date = date('Y-m-d H:i:s');

        $query = $db->prepare("INSERT INTO articles (title, text, date, id_user) VALUES (?, ?, ?, ?)");
        $query->bind_param('sssi', $title, $text, $date, $user_id);
        $query->execute();

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: No se puede crear el artículo. El usuario no está autenticado.";
    }
}

// Obtener artículos con el nombre del usuario
$articles = $db->query("SELECT articles.*, users.username FROM articles JOIN users ON articles.id_user = users.id");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    // Actualizar el artículo
    $query = $db->prepare("UPDATE articles SET title = ?, text = ? WHERE id = ?");
    $query->bind_param('ssi', $title, $text, $id);
    $query->execute();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


// Crear un nuevo comentario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_comment'])) {
    if ($user_id !== null) {
        $comment_text = $_POST['comment_text'];
        $article_id = $_POST['article_id'];
        $date = date("Y-m-d H:i:s");
        $query = $db->prepare("INSERT INTO comments (text, date, id_user, id_article) VALUES (?, ?, ?, ?)");
        $query->bind_param('ssii', $comment_text, $date, $user_id, $article_id);
        $query->execute();
        
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: Debes iniciar sesión para comentar.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        /* Estilo para el header */
        header {
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        header h2 {
            margin: 0;
            font-size: 2rem;
        }
        header h3 {
            margin: 5px 0;
            font-size: 1.2rem;
        }
        header form {
            margin-top: 15px;
        }
        header input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            width: 200px;
            margin-right: 10px;
        }
        header button {
            padding: 10px 15px;
            background-color: #fff;
            color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        header button:hover {
            background-color: #e6e6e6;
        }

        h2 {
            color: #333;
        }
        .logout-link {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: bold;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 28%;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            margin-top: 0;
        }
        .card p {
            color: #666;
        }
        .card .date {
            font-size: 0.9em;
            color: #999;
        }
        .card .author {
            font-size: 0.9em;
            color: #007BFF;
        }
        .actions {
            margin-top: 15px;
        }
        .actions a {
            color: #007BFF;
            text-decoration: none;
            margin-right: 10px;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header>
        <h2>EL Blog</h2>
        <h3>Bienvenido, <?php echo $_SESSION['username']; ?> | <a class="logout-link" href="?logout">Cerrar Sesión</a></h3>
        <form method="POST" action="search">
            <input type="text" name="search" placeholder="Buscar...">
            <button type="submit">Buscar</button>
        </form>
    </header>

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
            <!-- Mostrar contenido si está autenticado -->
            <h2>Crear Nuevo Artículo</h2>
            <form method="POST" action="">
                <label for="title">Título:</label>
                <input type="text" name="title" required><br><br>
                <label for="text">Texto:</label>
                <textarea name="text" required></textarea><br><br>
                <button type="submit" name="create_article">Crear Artículo</button>
            </form>

            <h2>Listado de Artículos</h2>
        <div class="cards-container">
            <?php while ($row = $articles->fetch_assoc()) { ?>
                <div class="card">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><?php echo $row['text']; ?></p>
                    <p class="date"><?php echo $row['date']; ?></p>
                    <p class="author">Autor: <?php echo $row['username']; ?></p>
                    <div class="actions">
                        <a href="?edit=<?php echo $row['id']; ?>">Editar</a>
                        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este artículo?');">Eliminar</a>
                    </div>

                    <!-- Sección de comentarios -->
                    <h4>Comentarios</h4>
                    <?php
                    $article_id = $row['id'];
                    $comments = $db->query("SELECT comments.*, users.username FROM comments JOIN users ON comments.id_user = users.id WHERE id_article = $article_id");
                    
                    if ($comments->num_rows > 0) {
                        while ($comment = $comments->fetch_assoc()) { ?>
                            <div class="comment">
                                <p><strong><?php echo $comment['username']; ?>:</strong> <?php echo $comment['text']; ?></p>
                                <p class="date"><?php echo $comment['date']; ?></p>
                            </div>
                        <?php }
                    } else {
                        echo "<p>No hay comentarios.</p>";
                    }
                    ?>

                    <!-- Formulario para agregar un comentario -->
                    <form method="POST" action="">
                        <input type="hidden" name="article_id" value="<?php echo $row['id']; ?>">
                        <textarea name="comment_text" placeholder="Escribe tu comentario..." required></textarea><br>
                        <button type="submit" name="create_comment">Comentar</button>
                    </form>
                </div>
            <?php } ?>
            </div>

            <?php
            // Mostrar formulario de edición si se ha seleccionado un artículo para editar
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];

                // Obtener datos del artículo
                $query = $db->prepare("SELECT * FROM articles WHERE id = ?");
                $query->bind_param('i', $id);
                $query->execute();
                $result = $query->get_result();
                $article = $result->fetch_assoc();
            ?>
                <h2>Editar Artículo</h2>
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                    <label for="title">Título:</label>
                    <input type="text" name="title" value="<?php echo $article['title']; ?>" required><br><br>

                    <label for="text">Texto:</label>
                    <textarea name="text" required><?php echo $article['text']; ?></textarea><br><br>

                    <button type="submit" name="edit">Actualizar</button>
                </form>
            <?php }
            ?>
        <?php endif; ?>
    </div>
</body>
</html>

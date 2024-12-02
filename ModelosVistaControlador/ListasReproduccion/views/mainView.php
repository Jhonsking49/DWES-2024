<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1>Página principal</h1>
    <a href="index.php?c=register&registerView=1">Register</a>
    <a href="index.php?c=login&loginView=1">Login</a><br><br><br>

    <a href="index.php?c=lista&add=1">Crear lista</a>
    <?php
    if (isset($_GET['add'])) {
        echo "<form action='index.php?c=lista&create=1' method='post'>";
        echo "Título: <input type='text' name='titulo' required><br>";
        echo "<input type='submit' value='Crear'>";
        echo "</form>";
    }
    ?>

    <h2>Buscar Canciones</h2>
    <form action="index.php?c=lista&searchSongs=1" method="post">
        <input type="text" name="query" placeholder="Buscar por título o autor" required>
        <button type="submit">Buscar</button>
    </form>

    <h2>Listas del usuario</h2>

    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] !== false) {
        $listas = ListRepository::getAllListas($_SESSION['user']->getId());
        foreach ($listas as $lista) {
            echo "<a href='index.php?c=lista&listaView=1&id=" . $lista->getId() . "'>- Título: " . $lista->getNombre() . "</a><br>";
            echo "<br>";

            // Enlace para crear una nueva canción
            echo "<a href='index.php?c=lista&createSong=1&id=" . $lista->getId() . "'>Crear canción</a><br>";
            if (isset($_GET['createSong']) && $_GET['id'] == $lista->getId()) {
                echo "<form action='index.php?c=lista&creates=1&id=" . $lista->getId() . "' method='post'>";
                echo "Canción: <input type='text' name='titulo' required><br>";
                echo "Autor: <input type='text' name='autor' required><br>";
                echo "Duración: <input type='number' name='duracion' required><br>";
                echo "<input type='submit' value='Añadir canción'>";
                echo "</form>";
            }

            // Enlace para añadir una canción a la lista
            echo "<br><a href='index.php?c=lista&addSong=1&id=" . $lista->getId() . "'>Añadir canción a la lista</a><br><br>";
            if (isset($_GET['addSong']) && $_GET['id'] == $lista->getId()) {
                echo "<form action='index.php?c=lista&addSongToList=1&id=" . $lista->getId() . "' method='post'>";
                echo "Canción: <input type='text' name='cancion' list='songList' required><br>";
                echo "<datalist id='songList'>";
                
                // Mostrar las canciones disponibles para añadir
                $songs = SongRepository::getAllSongsByLista($lista->getId());
                foreach ($songs as $song) {
                    echo "<option value='" . $song->getTitulo() . "'>";
                }
                echo "</datalist>";
                
                echo "<input type='submit' value='Añadir a lista'>";
                echo "</form>";
            }
        }
    }
    ?>

    <br><br><br><br><br><br><br>
    <?php
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        echo "Hola " . $user->getNombre();
        if ($user->getNombre() !== 'invitado') {
            echo " <a href='index.php?c=login&logout=1'>Salir</a><br><br>";
        }
    } else {
        echo "Bienvenido, invitado. Por favor, inicia sesión.";
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>hola</h1>
    <a href="index.php?c=user&logout=1">Logout</a>
    <?php
    if (isset($_SESSION['user'])) {
        echo "Welcome, " . $_SESSION['user']->getUsername();

        if ($_SESSION['user']->getRol()) {
            echo "<a href='index.php?c=product&newProduct=1'>Nuevo producto</a>";
        }
    }

    if (isset($songs)) {
        foreach ($songs as $song) {
            echo '<div class="cancion">';
            echo '<li>' . htmlspecialchars($song->getTitle()) . '</li>';
            echo '<form action="asignarCancion.php" method="post">';
            echo '<label for="playlist">Asignar a lista:</label>';
            echo '<select name="playlist" id="playlist">';
    
            if (isset($lists) && !empty($lists)) {
                foreach ($lists as $list) {
                    echo '<option value="' . htmlspecialchars($list->getTitle()) . '">' . htmlspecialchars($list->getTitle()) . '</option>';
                }
            } else {
                echo '<option value="" disabled>No hay listas disponibles</option>';
            }
    
            echo '</select>';
            echo '<input type="hidden" name="cancion_id" value="' . htmlspecialchars($song->getId()) . '">';
            echo '<input type="submit" value="Asignar">';
            echo '</form>';
            echo '</div>';
        }
    }
    if (!isset($lists)) {
        echo 'No hay listas';
    } else {
        foreach ($lists as $list) {
            echo '<li>' . $list->getTitle() . '</li>';
        }
    }

        echo
    '<form action="index.php?n=list" method="post">
            <input type="submit" name="crearLista" value="Crear lista">
            </form>';

    echo
    '<form action="index.php?nc=song" method="post">
            <input type="submit" name="createSong" value="Introducir nueva canción">
            </form>';
    ?>
</body>

</html>
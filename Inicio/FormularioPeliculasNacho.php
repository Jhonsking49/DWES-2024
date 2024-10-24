<?php

session_start();
$db = new mysqli('localhost', 'root', '', 'prueba');

function showfilms($db)
{
    $q = "SELECT * FROM films";
    $result = $db->query($q);
    $films = array();
    while ($row = $result->fetch_assoc()) {
        $films[] = $row;
    }
    return $films;
}

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    $_SESSION['username'] = 'invitado';
}


if (isset($_GET['logout'])) {
    $_SESSION['login'] = false;
    $_SESSION['username'] = "invitado";
}

if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $q = "SELECT * FROM users WHERE username='" . $_POST['username'] . "'";
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] == md5($_POST['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
                $info = "Sesión iniciada correctamente";
            } else $info = "contraseña erronea";
        } else $info = "usuario no existe";
    }
}

if (isset($_GET['del'])) {
    $q = "DELETE FROM movie WHERE id=" . $_GET['del'];
    $db->query($q);
    $info = "Pelicula borrada correctamente";
}

if (isset($_POST['addMovie'])) {
    if (isset($_POST['title']) && isset($_POST['year'])) {

        if ($_FILES['poster']['name'] != "") {
            $img = $_FILES['poster']['name'];

            move_uploaded_file($_FILES['poster']['tmp_name'], 'img/' . $img);
        } else $img = "defecto.jpg";

        $q = "INSERT INTO movie VALUES (NULL, '" . $_POST['title'] . "', " . $_POST['year'] . ", '" . $img . "',0)";
        if ($db->query($q)) {
            $info = "Pelicula " . $_POST['title'] . " añadida";
        }
    }
}

if (isset($_GET['like'])) {
    $q = "UPDATE movie SET likes = likes+1 WHERE id= " . $_GET['like'];
    $db->query($q);
    header('location: films2.php');
}
?>

<html>

<body>
    <h1>peliculas</h1><br>
    <?php
    if ($_SESSION['login']) {
        echo "hola " . $_SESSION['username'] . " <a href='films2.php?logout=1'>Salir</a><br><br>";

        $films = showfilms($db);

        foreach ($films as $movie) {
            echo "<img src='img/" . $movie['poster'] . "' width='50px'>" . $movie['title'] . " " . $movie['likes'] . "♥
            <a href='films2.php?like=" . $movie['id'] . "'>LIKE</a>
            <a href='films2.php?del=" . $movie['id'] . "'>X</a><br>";
        }
    } else {
    ?>

        <form method="post" action="films2.php">
            <input type="text" name="username" placeholder="nombre de usuario">
            <input type="password" name="password" placeholder="contraseña">
            <input type="submit" name="login" value="Login" />
        </form>

    <?php

    }
    ?>

    <h2>crear pelicula</h2>
    <form method="post" action="films2.php" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="nombre de la pelicula">
        <input type="number" name="year" placeholder="año">
        <input type="file" name="poster" placeholder="imagen">
        <input type="submit" name="addMovie" value="Añadir pelicula" />
    </form>

    <?php
    if (isset($info)) echo "<script>
        alert('" . $info . "')
    </script>";
    ?>

</body>

</html>
<?php
session_start();

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    $_SESSION['number'] = 0;
}

$db = new mysqli("localhost", "root", "", "test1");


if (isset($_GET['logout'])) {
    $_SESSION['login'] = false;
    unset($_SESSION['username']);
    $_SESSION['number'] = 0;
}

if (isset($_POST['login'])) {
    $q = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "'";
    if ($result = $db->query($q)) {
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] == md5($_POST['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
            } else $info = "la  contraseña no es valida";
        } else $info = "El nombre de usuario no existe en el sistema";
    }
}

if (isset($_POST['register'])) {
    //comprobar que recibo todas las variables
    //comprobar que las 2 contraseñas son iguales
    //comprobar que el usuario no existe
    //sino, guardar

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && $_POST['password2'] == $_POST['password']) {
        $q = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "'";
        $result = $db->query($q);
        if (!$result->num_rows) {
            $q = "INSERT INTO users VALUES (null, '" . $_POST['username'] . "', MD5('" . $_POST['password'] . "'))";
            $result = $db->query($q);
            $info = "Registro completado";
        } else $info = "El nombre de usuario ya existe en el sistema.";
    } else $info = "Los datos no son válidos";
}

if (isset($_POST['saveMovie'])) {
    if (isset($_POST['title']) && isset($_POST['year']) && isset($_POST['poster'])) {
        $q = "INSERT INTO movie VALUES (null, '" . $_POST['title'] . "','" . $_POST['year'] . "','" . $_POST['poster'] . "')";
        $db->query($q);
        $info = "pelicula " . $_POST['title'] . " añadida correctamente";
    }
}

?>

<html>

<body>
    <?php

    if ($_SESSION['login']) {
        echo "Bienvenido " . $_SESSION['username'] . " <a href='?logout=1'>logout</a>";
    } else {

        if (isset($_GET['register'])) {
            //formulario de registros 
    ?>
            <form method="post" action="movies.php">
                <input type="text" name="username" placeholder="nombre de uruario">
                <input type="password" name="password" placeholder="contraseña">
                <input type="password" name="password2" placeholder="repite contraseña">
                <input type="submit" name="register" value="Registrarme">
            </form>
        <?php
        } else {

        ?>
            <form method="post" action="movies.php">
                <input type="text" name="username" placeholder="nombre de usuario">
                <input type="password" name="password" placeholder="contraseña">
                <input type="submit" name="login" value="Login" />

            </form>
            <a href="?register=1">Registrarme</a>
    <?php }
    } ?>


    <?php

    if ($_SESSION['login']) {
        $q = "SELECT * FROM movie";
        $result = $db->query($q);

        while ($row = $result->fetch_assoc()) {
            echo $row['title'] . '<br>';
        }
    }

    if (isset($_GET['addMovie'])) {
    ?>
        <form method="POST" action="movies.php">
            <input type="text" name="title" placeholder="nombre del movie">
            <input type="number" name="year" placeholder="Año">
            <input type="text" name="director" placeholder="director">
            <input type="text" name="poster" placeholder="nombre archivo">
            <input type="submit" name="saveMovie" value="Guardar peli" />

        </form>
    <?php
    } else    echo '<a href="?addMovie=1">Add Movie</a>';


    if (isset($info)) {
        echo "<script>alert('" . $info . "')</script>";
    }
    ?>


</body>

</html>
<?php
session_start();

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    $_SESSION['number'] = 0;
}

$db = new mysqli("localhost", "root", "", "prueba");

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
                $_SESSION['number'] = $row['number'];
            }
        }
    }
}

if (isset($_GET['op'])) {
    if ($_GET['op'] == "+")
        $_SESSION['number'] += $_GET['number'];
    else if ($_GET['op'] == "-")
        $_SESSION['number'] -= $_GET['number'];
    else if ($_GET['op'] == "*")
        $_SESSION['number'] *= $_GET['number'];
    else if ($_GET['op'] == "/")
        $_SESSION['number'] /= $_GET['number'];

    $q = "UPDATE users SET number = '" . $_SESSION['number'] . "' WHERE username = '" . $_SESSION['username'] . "'";
    $db->query($q);
    header('location: incrementador.php');
}

?>
<html>

<head></head>

<body>

    <?php
    if ($_SESSION['login']) {
        echo "Bienvenido " . $_SESSION['username'] . " <a href='incrementador.php?logout=1'>logout</a>";
    } else {
    ?>
        <form method="post" action="incrementador.php">
            <input type="text" name="username" placeholder="nombre de usuario">
            <input type="password" name="password" placeholder="contraseña">
            <input type="submit" name="login" value="Login" />

        </form>
    <?php } ?>

    <div align="center">
        <p><?php echo $_SESSION['number']; ?></p>
        <form method="get" action="incrementador.php">
            <input type="number" name="number" placeholder="pon un numero" required>
            <input type="submit" name="op" value="+" />
            <input type="submit" name="op" value="-" />
            <input type="submit" name="op" value="*" />
            <input type="submit" name="op" value="/" />

        </form>
    </div>
</body>

</html>
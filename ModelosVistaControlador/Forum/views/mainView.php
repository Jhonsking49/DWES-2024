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

    foreach ($elementos as $element) {
        echo "<p>" . $element->getName();
        echo "</p>";
    }

    if (isset($_SESSION['info'])) {
        echo "<script>alert('" . $_SESSION['info'] . "')</script>";
        unset($_SESSION['info']);
    }
    ?>
</body>

</html>
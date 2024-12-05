<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            <?php include "styles.css" ?>
        </style>
        <title>ADD NEW PRODUCT</title>
        </head>

        <body>
        <?php
            include("views/Header.php");
            echo "<form action='index.php?main=product&addProduct' method='POST' enctype='multipart/form-data' class='insert-pub-form-layout'>";
            echo "<input type='text' placeholder='Nombre' name='name'>";
            echo "<input type='text' placeholder='Descripción' name='description'>";
            echo "<input type='text' placeholder='Precio' name='price'>";
            echo "<input type='text' placeholder='Stock' name='stock'>";
            echo "<input type='file' name='img'>";
            echo "<input class='btn' type='submit' name='newProduct' value='Enviar'>";
            echo "</form>";

            include("views/Footer.php");
        ?>
    </body>

</html>
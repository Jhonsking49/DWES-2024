<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            <?php include "styles.css" ?>
        </style>
        <title>Signin</title>
    </head>

    <body>
        <div class="login-layout">
            <form action='index.php?main=auth' method='POST'>
            <h1>Signin</h1>
            <input type='text' id='user' name='user' placeholder='Username'>
            <input type='password' id='password' name='password' placeholder='Password'>
            <input type='submit' name='register' class="btn">
            </form>
            <span>Ya estás <a href="index.php">registrado?</a></span>
        </div>
        <?php
            include("views/Footer.php");
        ?>
    </body>

</html>
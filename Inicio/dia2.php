<!DOCTYPE html>
    <!-- Martes 23 de septiembre de 2024 -->
<html lang="es">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>23 de septiembre de 2024</title>
    <h1>Web con botones para sumar y restar</h1>
</head>
<?php
    session_start();
    if(!isset($_SESSION['n'])) {
        $_SESSION['n'] = 0;
    }
    if(isset($_GET['num']) && isset($_GET['op'])) {
        $_SESSION['n'] += $_GET['num'];
    }
    ?>
<body>
    <br><br>
    <div align="center">
        <?php
            echo $_SESSION['n'];
        ?>
    </div>
    <br><br>

    <div align="center">
        <form action="?inc" method="post">
            <a href="?inc=5">+5</a> - <a href="?inc=7">+7</a>
            <a href="?inc=-1">-1</a> - <a href="?inc=-3">-3</a>
            
        </form>
    </div>
</body>
</html>
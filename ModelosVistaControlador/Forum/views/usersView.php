<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de todos los usuarios</title>
</head>
<body>
    <h1>Lista de usuarios</h1>
    <ul>

        <?php
    foreach($users as $user){
        echo "<li> Nombre del usuario: ".$user->getUsername()."</li>";
        echo "<li> Correo electronico del usuario: ".$user->getEmail()."</li>";
        echo "<li> Nombre del usuario: ".$user->getUsername()."</li>";
    }
    
    ?>
    </ul>
</body>
</html>
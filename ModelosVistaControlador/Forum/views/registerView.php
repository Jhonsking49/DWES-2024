<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Registrar nuevo usuario</h1>
    <form action="index.php?c=user?register=1" method="post">
        <input type="text" id="name" name="username" required placeholder="nombre usuario"><br><br>
        <input type="password" id="password" name="password" placeholder="contraseña" required><br>
        <input type="email" id="email" name="email" placeholder="email" required><br>
        <!-- crear campo para cargar el avatar -->
        <input type="file" id="avatar" name="avatar" placeholder="avatar"><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main View</title>
    <style>
        :root {
            --verde-oscuro: #146152;
            --verde-intermedio: #44803F;
            --verde-claro: #B4CF66;
            --amarillo: #FFEC5C;
            --naranja: #FF5A33;
            --blanco: #ffffff;
            --gris: #f5f5f5;
            --texto: #333333;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--gris);
            color: var(--texto);
            margin: 0;
            padding: 0;
        }

        header {
            background-color: var(--verde-oscuro);
            color: var(--blanco);
            padding: 20px;
            text-align: center;
        }

        header a {
            color: var(--amarillo);
            text-decoration: none;
            font-weight: bold;
        }

        header a:hover {
            color: var(--naranja);
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: var(--blanco);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .welcome {
            margin-bottom: 20px;
            font-size: 1.2em;
            font-weight: bold;
            color: white;
        }

        .forum {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid var(--blanco);
            border-radius: 8px;
            background-color: var(--gris);
        }

        .forum h2 {
            margin: 0;
            color: var(--verde-oscuro);
        }

        .forum p {
            margin: 5px 0;
        }

        .forum a {
            color: var(--verde-oscuro);
            text-decoration: none;
            font-weight: bold;
        }

        .forum a:hover {
            color: var(--naranja);
        }

        .new-product {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: var(--amarillo);
            color: var(--texto);
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .new-product:hover {
            background-color: var(--naranja);
            color: var(--blanco);
        }
    </style>
</head>

<body>
    <header>
        <a href="index.php?c=user&logout=1">Logout</a>
        <?php
        if (isset($_SESSION['user'])) {
            echo "<div class='welcome'>Welcome, " . $_SESSION['user']->getUsername() . "</div>";
            if (UserRepository::isAdmin($_SESSION['user']->getId())==true) {
                echo "<a href='index.php?c=forum&newForum=1' class='new-forum'>Crear un nuevo foro</a>";
            }
        }
        ?>
    </header>
    <main>
        <?php
        foreach ($forums as $forum) {
            if($forum->getType() == 2){
                if(UserRepository::isAdmin($_SESSION['user']->getId())==true){
                    echo "<div class='forum'>";
                    echo "<h2>" . $forum->getForoname() . "</h2>";
                    echo "<p>" . $forum->getDescription() . "</p>";
                    echo "<p><a href='index.php?c=forum&getForumid=" . $forum->getId() . "'>Unirse al foro</a></p>";
                    echo "</div>";
                }
            } else {
                echo "<div class='forum'>";
                echo "<h2>" . $forum->getForoname() . "</h2>";
                echo "<p>" . $forum->getDescription() . "</p>";
                echo "<p><a href='index.php?c=forum&getForumid=" . $forum->getId() . "'>Unirse al foro</a></p>";
                echo "</div>";
            }
        }

        if (isset($_SESSION['info'])) {
            echo "<script>alert('" . $_SESSION['info'] . "')</script>";
            unset($_SESSION['info']);
        }
        ?>
    </main>
</body>

</html>

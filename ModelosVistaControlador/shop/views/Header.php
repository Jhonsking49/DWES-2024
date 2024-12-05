<header>
    <div class="user-header-settings">
        <?php
        if ($_SESSION["user"]->isAdmin()) {
            echo "<a class='btn' href='index.php?main=product&addProduct'>Añadir producto</a>";
            echo "<a class='btn' href='index.php?main=user&adminPanel'>Administrar usuarios</a>";
        }
        echo "<a class='btn' href='index.php?main=order&verCarrito'>Ver carrito</a>";
        echo "<a class='btn' href='index.php?main=order&watchAllUserOrders'>Ver pedidos realizados</a>";
        echo "<a class='btn' href='index.php?main=api&getUserOrder'>GET USER ORDER</a>";
        ?>

    </div>
    <div class="user-header-settings">
        <?php
        echo "<span>" . $_SESSION["username"]->getName() . "</span>";
        echo "<img src='public/img/default-user.jpg' class='user-img'/>";
        echo "<a class='btn' href='index.php'>Volver a productos</a>";
        echo "<a class='btn' href='index.php?main=user&salir' >SALIR</a>";
        ?>
    </div>
</header>
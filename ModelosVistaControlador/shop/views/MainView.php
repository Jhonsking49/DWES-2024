<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Tienda </title>
</head>

<body>
    <?php
    if (!empty($_SESSION['user'])) {


    ?>
        <h1>Estás logueado</h1>
        <form method="POST" action="index.php?c=user">
            <input type="submit" name="logout" value="Cerrar Sesión">
        </form>
        <?php
        if (!empty($_SESSION['user']) && $_SESSION['user']->getRol() > 1) {
        ?>
            <a href="index.php?c=product&addProduct=1"><button>Agregar Producto</button></a>
            <a href="index.php?c=admin&adminPanelView=1"><button>Panel Administración</button></a>

        <?php }

        foreach ($products as $product) {
        ?>
            <div class="products">
                <div class="img-product">
                    <img src="public/img/<?php echo $product->getImg(); ?>" style="width: 30px">
                </div>
                <div class="name">
                    <h3><?php echo $product->getName(); ?></h3>
                    <p class="description">Descripción producto: <br><?php echo $product->getDesc(); ?></p>
                    <p class="price">Precio: <?php echo $product->getPrice(); ?></p>
                    <p>Stock: <?php echo $product->getStock() ?></p>
                    
                    <!--<p>id Producto: <?php echo $product->getId() ?></p>-->
                </div>
                <?php if ($_SESSION['user']->getRol() > 0) { ?>
                    <form method="POST" action="index.php?c=user">
                        <input type="hidden" name="productID" value="<?php echo $product->getId(); ?>">
                        <input type="number" name="quantity" min="1" max="<?php echo $product->getStock(); ?>" value="1">
                        <input type="submit" name="addToCart" value="Añadir al Carrito">
                    </form>
                <?php } // Cierre del if para verificar el rol del usuario 
                ?>
            </div>
    <?php } ?>
    <h1>Carrito de Compras</h1>
<ul>
    <?php 
    $_SESSION['carrito'] = $_SESSION['user']->getCart();
    
    foreach ($_SESSION['carrito'] as $item){
    ?>
        <li>
            <h2><?php echo $item['product']->getName(); ?></h2>
            <p>Cantidad: <?php echo $item['quantity']; ?></p>
            <p>Precio Unidad: <?php echo $item['product']->getPrice(); ?>€</p>
            <p>Total: <?php echo $item['quantity'] * $item['product']->getPrice(); ?>€</p>
        </li>
    <?php } 
    ?>
</ul>
<p>Total del Carrito: <?php echo $totalCarrito?>€</p>
<a href="index.php?c=user&shopEnd">Finalizar Compra</a>
<?php
}
?>

</body>

</html>
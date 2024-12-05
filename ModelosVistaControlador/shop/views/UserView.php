<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Compras</title>
    <link rel="stylesheet" href="styles.css"> <!-- Agrega tus estilos -->
</head>
<body>
    <h1>Mis Compras</h1>
    <?php if (empty($userOrders)): ?>
        <p>No has realizado compras aún.</p>
    <?php else: ?>
        <?php foreach ($userOrders as $order): ?>
            <div class="order">
                <h3>Pedido ID: <?php echo htmlspecialchars($order->getId()); ?> | Fecha: <?php echo htmlspecialchars($order->getDate()); ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order->getLines() as $line): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($line->getProduct()->getDescription()); ?></td>
                                <td><?php echo htmlspecialchars($line->getQuantity()); ?></td>
                                <td><?php echo htmlspecialchars($line->getProduct()->getPrice()); ?>€</td>
                                <td><?php echo htmlspecialchars($line->getTotal()); ?>€</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p><strong>Total del Pedido: <?php echo htmlspecialchars($order->getTotal()); ?>€</strong></p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>

<?php

class LineOrderRepository
{

    public static function getLinesByOrderId($orderId)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM linea WHERE id_order = $orderId";
        $result = $connect->query($query);
        $lines = [];
        while ($line = $result->fetch_assoc()) {
            $lines[] = new LineOrder($line['id'], $line['id_product'], $line['id_order'], $line['quantity'], $line['price']);
        }
        return $lines;
    }

    public static function  addLineOrder($productId, $orderID, $quantity)
    {

        $product = ProductRepository::getProductById($productId);
        $price = $product->getPrice();
        $connect = Connection::connect();
        $query = "INSERT INTO linea VALUES (NULL, $orderID, $productId, $quantity, $price)";
        $connect->query($query);
        return $connect->insert_id;
    }
}

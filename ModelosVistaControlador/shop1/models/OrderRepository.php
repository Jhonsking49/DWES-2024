<?php

class OrderRepository
{

    public static function getOrdersByUser($user)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM orden WHERE state>0 AND id_user = {$user->getId()}";
        $result = $connect->query($query);
        $orders = [];
        while ($order = $result->fetch_assoc()) { {
                $orders[] = new Order($order['id'], $order['id_user'], $order['total'], $order['order_date'], $order['state']);
            }
            return $orders;
        }
    }

    public static function getCart($user)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM orden WHERE id_user = {$user->getId()} AND state=0";
        $result = $connect->query($query);
        if ($order = $result->fetch_assoc()) {
            $cart = new Order($order['id'], $order['id_user'], $order['total'], $order['order_date'], $order['state']);
        } else {
            $q = "INSERT INTO orden VALUES (NULL, " . $_SESSION['user']->getId() . ", 0, NOW(), 0)";
            $connect->query($q);

            $cart = OrderRepository::getOrderById($connect->insert_id);
        }
        return $cart;
    }

    public static function getOrderById($orderId)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM orden WHERE id = $orderId";
        $result = $connect->query($query);
        if ($order = $result->fetch_assoc()) {
            return new Order($order['id'], $order['id_user'], $order['total'], $order['order_date'], $order['state']);
        }
    }

    public static function setState($orderId, $state)
    {
        $connect = Connection::connect();
        $query = "UPDATE orden SET state=$state WHERE id=$orderId";
        $connect->query($query);
        return $connect->affected_rows > 0;
    }
}

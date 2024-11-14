<?php

class ProductRepository
{

    public static function getProducts()
    {
        $connect = Connection::connect();
        $result = $connect->query("SELECT * FROM producto");
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = new Product($row['id'], $row['name'], $row['price'], $row['stock'], $row['description'], $row['img']);
        }
        return $products;
    }

    public static function getProductById($id)
    {

        $connect = Connection::connect();
        $result = $connect->query("SELECT * FROM producto WHERE id = $id");
        if ($row = $result->fetch_assoc()) {
            return new Product($row['id'], $row['name'], $row['price'], $row['stock'], $row['description'], $row['img']);
        }
        return null;
    }

    public static function addProduct($name, $price, $stock, $description, $img)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO producto (name, price, stock, description, img) VALUES ('$name', $price, $stock, '$description', '$img')";
        $connect->query($query);

        return $connect->insert_id;
    }

    public static function updateStockProduct($productId, $quantity)
    {
        $connect = Connection::connect();
        $query = "UPDATE product SET stock = stock - $quantity WHERE id = $productId";
        $connect->query($query);
        return $connect->affected_rows;
    }
}

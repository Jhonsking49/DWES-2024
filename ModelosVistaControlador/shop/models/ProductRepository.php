<?php
require_once("models/ProductModel.php");

class ProductRepository {

    public function getAll() {
        $db = Conectar::conexion();
        $query = $db->prepare("SELECT * FROM product");
        $products = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $products[] = new ProductModel($row['name'], $row['description'], $row['img'], $row['price'], $row['quantity'], $row['id']);
        }
        return $products;
    }

    public function getById($id) {
        $db = Conectar::conexion();
        $query = $db->prepare("SELECT * FROM product WHERE id = ?");
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return new ProductModel($row['name'], $row['description'], $row['img'], $row['price'], $row['quantity'], $row['id']);
    }

    public function save(ProductModel $product) {
        $db = Conectar::conexion();
        $query = $db->prepare("INSERT INTO product (name, description, img, price, quantity) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$product->getDescription(), $product->getPrice(), $product->getQuantity()]);
    }

    public function update(ProductModel $product) {
        $db = Conectar::conexion();
        $query = $db->prepare("UPDATE product SET name = ?, description = ?, img = ?, price = ?, quantity = ? WHERE id = ?");
        $query->execute([$product->getName(), $product->getDescription(), $product->getImg(), $product->getPrice(), $product->getQuantity(), $product->getId()]);
    }

    public function delete($id) {
        $db = Conectar::conexion();
        $query = $db->prepare("DELETE FROM product WHERE id = ?");
        $query->execute([$id]);
    }
}
?>

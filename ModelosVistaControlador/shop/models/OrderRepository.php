<?php
require_once("models/OrderModel.php");
require_once("models/LineModel.php");

class OrderRepository {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=shop', 'root', ''); // Ajusta las credenciales
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM `order`");
        $orders = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lines = $this->getLinesByOrderId($row['id']);
            $orders[] = new OrderModel($row['user_id'], $row['date'], $lines, $row['id']);
        }
        return $orders;
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM `order` WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $lines = $this->getLinesByOrderId($row['id']);
        return new OrderModel($row['user_id'], $row['date'], $lines, $row['id']);
    }

    public function save(OrderModel $order) {
        $stmt = $this->db->prepare("INSERT INTO `order` (user_id, date) VALUES (?, ?)");
        $stmt->execute([$order->getUserId(), $order->getDate()]);
        $orderId = $this->db->lastInsertId();

        foreach ($order->getLines() as $line) {
            $this->saveLine($line, $orderId);
        }
    }

    public function update(OrderModel $order) {
        $stmt = $this->db->prepare("UPDATE `order` SET user_id = ?, date = ? WHERE id = ?");
        $stmt->execute([$order->getUserId(), $order->getDate(), $order->getId()]);

        $this->deleteLinesByOrderId($order->getId());
        foreach ($order->getLines() as $line) {
            $this->saveLine($line, $order->getId());
        }
    }

    public function delete($id) {
        $this->deleteLinesByOrderId($id);
        $stmt = $this->db->prepare("DELETE FROM `order` WHERE id = ?");
        $stmt->execute([$id]);
    }

    private function getLinesByOrderId($orderId) {
        $stmt = $this->db->prepare("SELECT * FROM lines WHERE order_id = ?");
        $stmt->execute([$orderId]);
        $lines = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lines[] = new LineModel($row['product_id'], $row['order_id'], $row['quantity'], $row['total'], $row['id']);
        }
        return $lines;
    }

    private function saveLine(LineModel $line, $orderId) {
        $stmt = $this->db->prepare("INSERT INTO lines (product_id, order_id, quantity, total) VALUES (?, ?, ?, ?)");
        $stmt->execute([$line->getProductId(), $orderId, $line->getQuantity(), $line->getTotal()]);
    }

    private function deleteLinesByOrderId($orderId) {
        $stmt = $this->db->prepare("DELETE FROM lines WHERE order_id = ?");
        $stmt->execute([$orderId]);
    }
}
?>

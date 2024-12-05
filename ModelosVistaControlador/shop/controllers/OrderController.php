<?php
require_once("models/OrderModel.php");
require_once("models/OrderRepository.php");

class OrderController {
    private $orderRepository;

    public function __construct() {
        $this->orderRepository = new OrderRepository();
    }

    public function index() {
        $orders = $this->orderRepository->getAll();
        include("views/OrderListView.php");
    }

    public function create($data) {
        $order = new OrderModel($data["user_id"], $data["date"], $data["lines"]);
        $this->orderRepository->save($order);
        header("Location: /index.php?main=order");
    }

    public function edit($id, $data) {
        $order = $this->orderRepository->getById($id);
        $order->setUserId($data["user_id"]);
        $order->setDate($data["date"]);
        $order->setLines($data["lines"]);
        $this->orderRepository->update($order);
        header("Location: /index.php?main=order");
    }

    public function delete($id) {
        $this->orderRepository->delete($id);
        header("Location: /index.php?main=order");
    }
}
?>

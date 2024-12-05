<?php
require_once("models/LineModel.php");
require_once("models/LineRepository.php");

class LineController {
    private $lineRepository;

    public function __construct() {
        $this->lineRepository = new LineRepository();
    }

    public function index() {
        $lines = $this->lineRepository->getAll();
        include("views/LineListView.php");
    }

    public function create($data) {
        $line = new LineModel($data["product_id"], $data["order_id"], $data["quantity"], $data["total"]);
        $this->lineRepository->save($line);
        header("Location: /index.php?main=line");
    }

    public function edit($id, $data) {
        $line = $this->lineRepository->getById($id);
        $line->setProductId($data["product_id"]);
        $line->setOrderId($data["order_id"]);
        $line->setQuantity($data["quantity"]);
        $line->setTotal($data["total"]);
        $this->lineRepository->update($line);
        header("Location: /index.php?main=line");
    }

    public function delete($id) {
        $this->lineRepository->delete($id);
        header("Location: /index.php?main=line");
    }
}
?>

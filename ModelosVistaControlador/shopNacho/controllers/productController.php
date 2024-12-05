<?php
require_once "models/Product.php";

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function showProducts() {
        $products = $this->productModel->getAllProducts();
        require_once "views/mainview.php";
    }
}
?>

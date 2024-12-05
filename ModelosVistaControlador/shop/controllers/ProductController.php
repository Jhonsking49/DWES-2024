<?php
require_once("models/ProductModel.php");
require_once("models/ProductRepository.php");

class ProductController {
    private $productRepository;

    public function __construct() {
        $this->productRepository = new ProductRepository();
    }

    // Método estático para obtener todos los productos
    public static function getAllProducts() {
        $productRepository = new ProductRepository();
        return $productRepository->getAll();
    }

    // Método para mostrar la lista de productos
    public function getProducts() {
        $products = $this->productRepository->getAll();
        include("views/ProductListView.php");
    }

    public function create($data) {
        $product = new ProductModel($data["description"], $data["price"], $data["quantity"]);
        $this->productRepository->save($product);
        header("Location: /index.php?main=product");
    }

    public function edit($id, $data) {
        $product = $this->productRepository->getById($id);
        $product->setDescription($data["description"]);
        $product->setPrice($data["price"]);
        $product->setQuantity($data["quantity"]);
        $this->productRepository->update($product);
        header("Location: /index.php?main=product");
    }

    public function delete($id) {
        $this->productRepository->delete($id);
        header("Location: /index.php?main=product");
    }
}
?>

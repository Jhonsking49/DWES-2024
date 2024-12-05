<?php

class ProductModel {
    private $id;
    private $name;
    private $description;
    private $img;
    private $price;
    private $quantity;

    public function __construct($name, $description, $img,$price, $quantity, $id = null) {
        $this->name = $name;
        $this->description = $description;
        $this->img = $img;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->id = $id;
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}
?>

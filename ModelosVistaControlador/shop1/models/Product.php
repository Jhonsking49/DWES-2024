<?php

class Product
{

    private $id;
    private $name;
    private $price;
    private $stock;
    private $description;
    private $img;

    public function __construct($id, $name, $price, $stock, $description, $img)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->description = $description;
        $this->img = $img;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function getStock()
    {
        return $this->stock;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function updateStock($quantity)
    {
        $this->stock -= $quantity;
        ProductRepository::updateStockProduct($this->getId(), $quantity);
    }
}

<?php

class LineOrder
{
    private $id;
    private $orderId;
    private $product;
    private $price;
    private $quantity;

    public function __construct($id, $orderId, $productId, $price, $quantity)
    {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->product = ProductRepository::getProductById($productId);
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}

<?php

class LineModel{
    private $id;
    private $product_id;
    private $amount;
    private $order_id;
    private $price_product;

    public function __construct($datos){
        $this->id = $datos["id"];
        $this->product_id = $datos["product_id"];
        $this->amount = $datos["amount"];
        $this->order_id = $datos["o_id"];
        $this->price_product = $datos["price"];
    }

    public function getId(){
        return $this->id;
    }
    public function get_product_id(){
        return $this->product_id;
    }
    public function get_amount(){
        return $this->amount;
    }
    public function get_order_id(){
        return $this->order_id;
    }
    public function getPriceProduct(){
        return $this->price_product;
    }
}

?>
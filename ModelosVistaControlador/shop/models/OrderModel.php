<?php

class OrderModel{
    private $id;
    private $lines = [];
    private $user_id;
    private $state;
    private $datetime;

    public function __construct($datos){
        $this->id = $datos["id"];
        $this->user_id = $datos["u_id"];
        $this->datetime = $datos["datetime"];
        $this->state = $datos["state"];
        $this->lines = $datos["lines"];
    }

    public function getId(){
        return $this->id;
    }

    public function getLines(){
        return $this->lines;
    }

    public function getUser_id(){
        return $this->user_id;
    }
    public function getState(){
        return $this->state;
    }
    public function getDatetime(){
        return $this->datetime;
    }
}

?>
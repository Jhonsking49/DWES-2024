<?php

class Order
{

    private $id;
    private $orderDate;
    private $user_id;
    private $total;
    private $state;
    private $lines = array();

    public function __construct($id, $orderDate, $user, $total, $state)
    {
        $this->id = $id;
        $this->orderDate = $orderDate;
        $this->user_id = $user;
        $this->total = $total;
        $this->state = $state;
        $this->lines = LineOrderRepository::getLinesByOrderId($id);
    }

    public function getOrderLines()
    {
        return $this->lines;
    }
    public function getUser()
    {
        return UserRepository::getUserById($this->user_id);
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getState()
    {
        return $this->state;
    }
    public function setState($state)
    {
        $this->state = $state;
        OrderRepository::setState($this->getId(), $state);
    }

    public function addLine($productId)
    {
        LineOrderRepository::addLineOrder($productId, $this->getId(), 1);
    }
}

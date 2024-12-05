<?php

class OrderModel {
    private $id;
    private $userId;
    private $date;
    private $lines; // Array of LineModel objects

    public function __construct($userId, $date, $lines = [], $id = null) {
        $this->userId = $userId;
        $this->date = $date;
        $this->lines = $lines;
        $this->id = $id;
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getLines() {
        return $this->lines;
    }

    public function setLines($lines) {
        $this->lines = $lines;
    }

    public function addLine(LineModel $line) {
        $this->lines[] = $line;
    }
}
?>

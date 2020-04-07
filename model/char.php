<?php
class Character {
    private $id, $char_name, $win, $loss, $total;

    public function __construct($char_name, $win, $loss, $total) {
        $this->char_name = $char_name;
        $this->win = $win;
        $this->loss = $loss;
        $this->total = $total;
    }

    public function getID() {
        return $this->id;
    }
    public function setID($value) {
        $this->id = $value;
    }

    public function getCharName() {
        return $this->char_name;
    }
    public function setCharName($value) {
        $this->char_name = $value;
    }

    public function getWin() {
        return $this->win;
    }
    public function setWin($value) {
        $this->win = $value;
    }

    public function getLoss() {
        return $this->loss;
    }
    public function setLoss($value) {
        $this->loss = $value;
    }

    public function getTotal() {
        return $this->total;
    }
    public function setTotal($value) {
        $this->total = $value;
    }
}
?>
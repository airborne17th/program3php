<?php
class Player {
    private $id, $first_name, $last_name, $email, $player_name, $password, $win, $loss, $total;

    public function __construct($first_name, $last_name, $email, $player_name, $password, $win, $loss, $total) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->player_name = $player_name;
        $this->password = $password;
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

    public function getFirstName() {
        return $this->first_name;
    }
    public function setFirstName($value) {
        $this->first_name = $value;
    }

    public function getLastName() {
        return $this->last_name;
    }
    public function setLastName($value) {
        $this->last_name = $value;
    }

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($value) {
        $this->email = $value;
    }

    public function getPlayerName() {
        return $this->player_name;
    }
    public function setPlayerName($value) {
        $this->player_name = $value;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($value) {
        $this->password = $value;
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
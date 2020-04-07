<?php
class Match {
    private $id, $player1_name, $player1_ID, $char1_name, $player2_name, $player2_ID, $char2_name, $winner_name;

    public function __construct($winner_name) {
        $this->winner_name = $winner_name;
    }

    public function getMatchID() {
        return $this->id;
    }
    public function setMatchID($value) {
        $this->id = $value;
    }

    public function getPlayer1_Name() {
        return $this->player_name;
    }
    public function setPlayer1_Name($value) {
        $this->player_name = $value;
    }

    public function getPlayer1_ID() {
        return $this->player1_ID;
    }
    public function setPlayer1_ID($value) {
        $this->player1_ID = $value;
    }

    public function getChar1_Name() {
        return $this->char1_name;
    }
    public function setChar1_Name($value) {
        $this->char1_name = $value;
    }

    public function getPlayer2_Name() {
        return $this->player_name;
    }
    public function setPlayer2_Name($value) {
        $this->player_name = $value;
    }

    public function getPlayer2_ID() {
        return $this->player2_ID;
    }
    public function setPlayer2_ID($value) {
        $this->player2_ID = $value;
    }

    public function getChar2_Name() {
        return $this->char2_name;
    }

    public function setChar2_Name($value) {
        $this->char2_name = $value;
    }

    public function getWinner_Name() {
        return $this->winner_name;
    }
    public function setWinner_Name($value) {
        $this->winner_name = $value;
    }
}
?>
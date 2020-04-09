<?php
    class MatchChar {
        private $id, $char_name;

        public function __construct($char_name) {
            $this->char_name = $char_name;

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
    }
    ?>
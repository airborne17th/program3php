<?php
require('../model/database.php');
require('../model/player.php');
require('../model/player_db.php');
require('../model/match.php');
require('../model/match_char.php');
require('../model/match_player.php');
require('../model/match_db.php');
require('../model/char.php');
require('../model/char_db.php');
session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_matches';
    }
}
switch ($action) {
    case 'list_matches':
        $matches = MatchDB::getMatches();
        include('match_records.php');
        break;
    case 'record_match':
        $error_message = '';
        if(isset($_SESSION["player_name"])){

        } else {
            // This can never be set by a player naturally with the regex.
            $_SESSION["player_name"] = "!";
        }

        $player = $_SESSION["player_name"];

        if (is_null($player)){
            $error_message = "Sorry, only members can record matches!";;
            include('registration.php');
        } 

        if ($player === "!")
        {
            $error_message = "Sorry, only members can record matches!";
            include('../player_manager/registration.php');
        } else {
            $player_display = $_SESSION["player_name"];
            $matchplayers = MatchDB::getPlayers();
            $matchchars = MatchDB::getChars();
            include('record.php');
        }
        break;
    
    case 'add_match':
        $player_display = $_SESSION["player_name"];
        $matchplayers = MatchDB::getPlayers();
        $matchchars = MatchDB::getChars();

        // Fetch the data from the match
        $player1_ID = filter_input(INPUT_POST, 'player1_ID');
        $char1_ID = filter_input(INPUT_POST, 'char1_ID');
        $player2_ID = filter_input(INPUT_POST, 'player2_ID');
        $char2_ID = filter_input(INPUT_POST, "char2_ID");
        $winner_ID = filter_input(INPUT_POST, "winner_ID");
        $record_name = $_SESSION["player_name"];
        $loser_ID;
        $loser_charID;
        $winner_charID;
        $error_message = ''; 
        $isValid = true;

        // Validating the input
        if (empty($player1_ID) || empty($char1_ID) || empty($player2_ID) || empty($char2_ID) ||
        empty($winner_ID) )  {
            $error_message = "Invalid match data! Make sure all fields are filled.";
            $isValid = false;
        } else {
            $isValid = true;
        }

        if (is_numeric($player1_ID) || is_numeric($char1_ID) || is_numeric($player2_ID) || is_numeric($char2_ID) ||
        is_numeric($winner_ID) )  {
            $isValid = true;
        } else {
            $error_message = "Invalid match data! Make sure all fields are numbers.";
            $isValid = false;
        }

        if ($winner_ID === $player1_ID || $winner_ID === $player2_ID) {

        } else {
            $error_message = "Winner must be from the two players!";
            $isValid = false;
        }
        
        if ($player1_ID === $player2_ID){
            $error_message = "Cannot have the player play against the same player!";
            $isValid = false;
        }

        if ($winner_ID === $player1_ID){
            $loser_ID = $player2_ID;
            $loser_charID = $char2_ID;
            $winner_charID = $char1_ID;
        } else {
            $loser_ID = $player1_ID;
            $loser_charID = $char1_ID;
            $winner_charID = $char2_ID;
        }


        if($isValid == true) {
            //Method calls to fetch the remaining data based on what was passed down.
            $record_ID = MatchDB::getRecorderID($record_name);
            $player1_name = MatchDB::getPlayerName($player1_ID);
            $char1_name = MatchDB::getCharName($char1_ID);
            $player2_name = MatchDB::getPlayerName($player2_ID);
            $char2_name = MatchDB::getCharName($char2_ID);
            // This is the call to input all the data created
            $i = new Match($player1_name[0], $player1_ID, $char1_name[0], $player2_name[0], $player2_ID, $char2_name[0], $winner_ID, $record_ID[0]);
            MatchDB::addMatch($i);
            MatchDB::set_PlayerWin($winner_ID);
            MatchDB::set_PlayerLoss($loser_ID);
            MatchDB::set_CharWin($winner_charID);
            MatchDB::set_CharLoss($loser_charID);

            $error_message = "Successfully logged match!";
            include('record.php');
        } else{
            include('record.php');
        }
        break;  
}
?>
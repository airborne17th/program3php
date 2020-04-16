<?php
require('../model/database.php');
require('../model/player.php');
require('../model/player_db.php');
session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'registration';
    }
}
switch ($action) {
    case 'list_players':
        $players = PlayerDB::getPlayers();
        include('player_directory.php');
        break;
    case 'registration':
        include('registration.php');
        break;
    case 'add_player':
        // Fetch the data from the registration attempt
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $playerTest = filter_input(INPUT_POST, "newplayer");
        $passTest = filter_input(INPUT_POST, "newpass");
        
        // Values used for validation
        $validationCounter = 0;
        $isValid = true;

        // Validate the inputs
        if (empty($first_name) || empty($last_name) || empty($playerTest) || empty($passTest) ||
            $email === NULL || $email === false) {
                $error_message = "Invalid player data! Check all fields and try again.";
                $isValid = false;
            } else {
            $isValid = true;
            }
        
        // Regex validation
        if (preg_match('/^[A-Za-z]/', $playerTest)) {
            } else {
            $error_message = "Player must start with a letter.";
            $isValid = false;
            }

        if (preg_match('/^[a-zA-Z\d_-]{4,30}$/', $playerTest)) {
            } else {
                $error_message = "player must be within 4 to 30 characters in length. playername cannot have special characters (@$!%*?&).";
                $isValid = false;
            }
        
        if (preg_match('/^.{12,}$/', $passTest)) {
            } else {
                $error_message = "Password must be at least 12 characters long.";
                $isValid = false;
            } 

        if (preg_match('/(?=.*[a-z])/', $passTest)) {
                $validationCounter = $validationCounter + 1;
            }
            if (preg_match('/(?=.*[A-Z])/', $passTest)) {
                $validationCounter = $validationCounter + 1;
            }
            if (preg_match('/(?=.*\d)/', $passTest)) {
                $validationCounter = $validationCounter + 1;
            }
            if (preg_match('/(?=.*[@#$%^&*()\\[\]{}\-_=~`|:;])/', $passTest)) {
                $validationCounter = $validationCounter + 1;
            }
            if ($validationCounter >= 3) {
            } else {
                $error_message = "Password must have the following, an upper case letter, lower case letter, a digit and a special character.";
                $isValid = false;
            }

            $playerResult = playerDB::duplicatePlayer($playerTest);
        // Test for duplicate playername
        if ($playerResult > 0)
            {
                $error_message = "Player Name in use.";
                $isValid = false;
            } else {

            }

            $emailResult = playerDB::duplicateEmail($email);
            // Test for duplicate e-mail
            if ($emailResult > 0)
                {
                    $error_message = "E-mail in use.";
                    $isValid = false;
                } else {
    
                }
        // if it valid then insert data into the SQL Database
        if($isValid == true) {
            // Make the password being tested the final password
            $password = $passTest;
            $player_name = $playerTest;
            // Create the Session to validate the player is logged in and track name
            $_SESSION["player_name"] = $player_name;
            // Hash it for the server and pass it back to the password
            $hash = password_hash ( $password , PASSWORD_BCRYPT );
            $password = $hash;
            $win = 0;
            $loss = 0;
            $total = 0;
            $i = new Player($first_name, $last_name, $email, $player_name, $password, $win, $loss, $total);
            PlayerDB::addPlayer($i);
            include('confirmation.php');
        } else {
            include('registration.php');
        }
        break;
    case 'login_initial':
        $loginerror_message = "";
        include('login.php');    
        break;
    case 'login': 
        $isValid = true;
        $hash = "!";
        $loginerror_message = "";
        $player_entry = filter_input(INPUT_POST, 'player_entry');
        $password_entry = filter_input(INPUT_POST, 'password_entry');
        $hashed_password = playerDB::authenticationPlayer($player_entry);
        if (isset($hashed_password[0])) {
            $hash = $hashed_password[0];
            trim($hash); 
        }
           

        if(password_verify($password_entry, $hash)){
            $isValid = true;
        } else {
            $isValid = false;
            $loginerror_message = "Login Failed. Check player name or password.";
        } 

        if (isset($_SESSION["player_name"]) && $_SESSION["player_name"] !== "!"){
            $isValid = false;
            $loginerror_message = "Login Failed. Already logged in.";
        }

        if ($isValid == true) {
            $_SESSION["player_name"] = $player_entry;
            $loginerror_message = "Login Success!";
            include('login.php');
        } else {
            include('login.php');
        }
        break; 
    case 'logoff' :
       $_SESSION = array();
       session_destroy();
       $loginerror_message = "";
       include('login.php');
       break;
    case 'profile' :
        $player_message = '';
        $pass_message = '';
        $email_message = '';
        if(isset($_SESSION["player_name"])){

        } else {
            // This can never be set by a player naturally with the regex.
            $_SESSION["player_name"] = "!";
        }

        $player = $_SESSION["player_name"];

        if (is_null($player)){
            $error_message = "Not a member? Sign up here!";;
            include('registration.php');
        } 

        if ($player === "!")
        {
            $error_message = "Not a member? Sign up here!";
            include('registration.php');
        } else {
            $player_display = $_SESSION["player_name"];
            include('player_profile.php');
        }
    break;
    case 'changeplayer' :
        $oldplayer = $_SESSION["player_name"];
        $playerTest = filter_input(INPUT_POST, "newplayer");
        $playerResult = playerDB::duplicatePlayer($playerTest);
        $isValid = true; 
        if (preg_match('/^[A-Za-z]/', $userTest)) {
        } else {
            $error_message = "User must start with a letter.";
            $isValid = false;
        }

        if (preg_match('/^[a-zA-Z\d_-]{4,30}$/', $userTest)) {
        } else {
            $error_message = "User must be within 4 to 30 characters in length. Username cannot have special characters (@$!%*?&).";
            $isValid = false;
        }

        // Test for duplicate playername
        if ($playerResult > 0)
            {
                $player_message = "playername in use.";
                $isValid = false;
            } else {
                
            }
        
        if ($isValid == true){
            $newplayer = $playerTest;
            $player_message = "playername successfully updated.";
            playerDB::changeplayer($newplayer, $oldplayer);
            $_SESSION["player_name"] = $newplayer; 
        }
  
        $pass_message = '';
        $email_message = '';
        $player_display = $_SESSION["player_name"];
        include('playerprofile.php');
    break;   
    case 'changePassword' :
        $passTest = filter_input(INPUT_POST, "newpass");
        $validationCounter = 0;
        $isValid = true;
        if (preg_match('/^.{12,}$/', $passTest)) {
        } else {
            $pass_message = "Password must be at least 12 characters long.";
            $isValid = false;
        } 

        if (preg_match('/(?=.*[a-z])/', $passTest)) {
            $validationCounter + 1;
        }
        if (preg_match('/(?=.*[A-Z])/', $passTest)) {
            $validationCounter = $validationCounter + 1;
        }
        if (preg_match('/(?=.*\d)/', $passTest)) {
            $validationCounter = $validationCounter + 1;
        }
        if (preg_match('/(?=.*[@#$%^&*()\\[\]{}\-_=~`|:;])/', $passTest)) {
            $validationCounter = $validationCounter + 1;
        }
        if ($validationCounter >= 3) {
        } else {
            $pass_message = "Password must have the following, an upper case letter, lower case letter, a digit and a special character.";
            $isValid = false;
        }

        if ($isValid == true) {
            $password = $passTest;
            $hash = password_hash ( $password , PASSWORD_BCRYPT );
            $player = $_SESSION["player_name"];
            playerDB::changePassword($hash, $player);
            $pass_message = "Password successfully updated";
        } 
        $player_message = '';
        $email_message = '';
        $player_display = $_SESSION["player_name"];
        include('playerprofile.php');
        break;
    case 'changeEmail' :
            $emailTest = filter_input(INPUT_POST, "newemail", FILTER_VALIDATE_EMAIL);
            $emailResult = playerDB::duplicateEmail($emailTest);
            if ($emailResult > 0)
            {
            $email_message = "E-mail in use.";
            } else {
            $newEmail = $emailTest;
            $player = $_SESSION["player_name"];
            $email_message = "E-mail successfully updated.";
            playerDB::changeEmail($newEmail, $player);
            }
            $pass_message = '';
            $player_message = '';
            $player_display = $_SESSION["player_name"];
            include('playerprofile.php');
        break;        
}
?>
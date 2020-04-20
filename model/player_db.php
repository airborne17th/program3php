<?php
class PlayerDB {
    
    public static function getPlayers() {
      $db = Database::getDB();

      $query = 'SELECT * FROM players
                ORDER BY lastName';
      $statement = $db->prepare($query);
      $statement->execute();
      $rows = $statement->fetchAll();
      $statement->closeCursor();
      
      $players = array();
      foreach($rows as $row) {
          $i = new Player(
            $row['firstName'], $row['lastName'], $row['email'],
            $row['playerName'], $row['password'], $row['win'], $row['loss'], $row['total']);
          $i->setID($row['playerID']);
          $players[] = $i;
      }
      return $players;
  }

  public static function addPlayer($i) {
    $db = Database::getDB();
    
    $query = 'INSERT INTO players
                 (firstName, lastName, playerName, email, password)
              VALUES
                 (:first_name, :last_name, :player_name, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $i->getFirstName());
    $statement->bindValue(':last_name', $i->getLastName());
    $statement->bindValue(':player_name', $i->getPlayerName());
    $statement->bindValue(':email', $i->getEmail());
    $statement->bindValue(':password', $i->getPassword());
    $statement->execute();
    $statement->closeCursor();
}
   
    public static function authenticationPlayer($playerEntry) {
        $db = Database::getDB();
        $query = 'SELECT password FROM players WHERE playerName = :entry';
        $statement = $db->prepare($query);
        $statement->bindValue(':entry', $playerEntry);
        $statement->execute();
        $hashed_password = $statement->fetch();
        $statement->closeCursor();
        return $hashed_password;
    }
    
    
    public static function changePlayer($newPlayer, $oldPlayer) {
        $db = Database::getDB();
        $query = 'UPDATE players
                    SET playerName = :newPlayer
                  WHERE playerName = :oldPlayer'; 
        $statement = $db->prepare($query);
        $statement->bindValue(':newPlayer', $newPlayer);
        $statement->bindValue(':oldPlayer', $oldPlayer);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function changePassword($hash, $player) {
        $db = Database::getDB();
        $query = 'UPDATE players
                    SET password = :newPass
                  WHERE playerName = :player'; 
        $statement = $db->prepare($query);
        $statement->bindValue(':newPass', $hash);
        $statement->bindValue(':player', $player);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function changeEmail($newEmail, $player) {
        $db = Database::getDB();
        $query = 'UPDATE players
                    SET email = :newEmail
                    WHERE playerName = :player'; 
        $statement = $db->prepare($query);
        $statement->bindValue(':newEmail', $newEmail);
        $statement->bindValue(':player', $player);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function duplicatePlayer($playerTest) {
        $db = Database::getDB();
        $query = 'SELECT playerName FROM players
                  WHERE playerName = :playerTest'; 
        $statement = $db->prepare($query);
        $statement->bindValue(':playerTest', $playerTest);
        $statement->execute();
        $playerResult = $statement->fetch();
        $statement->closeCursor();
        
        return $playerResult;
    }

    public static function duplicateEmail($email) {
        $db = Database::getDB();
        $query = 'SELECT email FROM players
                  WHERE email = :emailTest'; 
        $statement = $db->prepare($query);
        $statement->bindValue(':emailTest', $email);
        $statement->execute();
        $emailResult = $statement->fetch();
        $statement->closeCursor();
        
        return $emailResult;
    }

    public static function get_WinRate() {
        $db = Database::getDB();
        $query = 'SELECT (win/total) AS winrate, IF(total > 0)
                FROM players
                ORDER BY lastName'; 
        $statement = $db->prepare($query);
        $statement->execute();
        $winrate = $statement->fetchAll();
        $statement->closeCursor();

        return $winrate;
    }

}
?>


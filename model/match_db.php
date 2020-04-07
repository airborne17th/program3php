
<?php
class MatchDB {
    public static function getMatches() {
        $db = Database::getDB();
  
        $query = 'SELECT * FROM matches
                  ORDER BY matchID';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $matches = array();
        foreach($rows as $row) {
            $i = new Match(
                    $row['player1_name'], $row['player1_ID'], $row['char1_name'],
                    $row['player2_name'], $row['player2_ID'], $row['char2_name'],
                    $row['winner_name']
                );
            $i->setID($row['matchID']);
            $matches[] = $i;
        }
        return $matches;
    }

    public static function getPlayer($i) {
        $db = Database::getDB();

        $query = 'SELECT playerID, playerName FROM players
                  ORDER BY playerName';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $players = array();
        foreach($rows as $row) {
            $i = new Player($row['playerName']);
            $i->setID($row['playerID']);
            $players[] = $i;
        }
        return $players;
    }


    public static function getChar($i) {
        $db = Database::getDB();

        $query = 'SELECT * FROM characters
                  ORDER BY charID';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $chars = array();
        foreach($rows as $row) {
            $i = new Character(
                    $row['charName']);
            $i->setID($row['charID']);
            $chars[] = $i;
        }
        return $chars;
    }
    
    public static function addMatch($i) {
      $db = Database::getDB();
      
      $query = 'INSERT INTO matches
                   (player1_name, player1_ID, char1_name, player2_name, player2_ID, char2_name, winner_name)
                VALUES
                   (:player1_name, :player1_ID, :char1_name, :player2_name, :player2_ID, :char2_name, :winner_name)';
      $statement = $db->prepare($query);
      $statement->bindValue(':player1_name', $i->getPlayer1_Name());
      $statement->bindValue(':player1_ID', $i->getPlayer1_ID());
      $statement->bindValue(':char1_name', $i->getChar1_Name());
      $statement->bindValue(':player2_name', $i->getPlayer2_Name());
      $statement->bindValue(':player2_ID', $i->getPlayer2_ID());
      $statement->bindValue(':char2_name', $i->getChar2_Name());
      $statement->bindValue(':winner_name', $i->getWinner_Name());
      $statement->execute();
      $statement->closeCursor();
  }

    public static function setWin($i) {

    }

    public static function setLoss($i) {

    }



?>
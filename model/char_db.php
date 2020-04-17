<?php
class CharDB {
    
    public static function getChars() {
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
                  $row['charName'], $row['win'],
                  $row['loss'], $row['total']);
          $i->setID($row['charID']);
          $chars[] = $i;
      }
      return $chars;
  }

  public static function getTopChars() {
    $db = Database::getDB();

    $query = 'SELECT * FROM characters 
    ORDER BY win  DESC LIMIT 3';
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    
    $chars = array();
    foreach($rows as $row) {
        $i = new Character(
                $row['charName'], $row['win'],
                $row['loss'], $row['total']);
        $i->setID($row['charID']);
        $chars[] = $i;
    }
    return $chars;
  }

  public static function get_WinRate() {
    $db = Database::getDB();
    $query = 'SELECT (win/total) winrate
            FROM characters
            ORDER BY win'; 
    $statement = $db->prepare($query);
    $statement->execute();
    $winrate = $statement->fetchAll();
    $statement->closeCursor();

    return $winrate;
    }
}
?>
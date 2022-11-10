<?php

class Vote{
    private string $up;

    private $down;

     // getter et setters de $up
    public function getUp():int{
        return $this->up;
    }
    public function setUp(int $up){
        return $this->up = $up;
    }

    // getter et setters de $down
    public function getDown():int{
        return $this->down;
    }
    public function setDown(int $down){
        return $this->down = $down;
    }

    public function create(){
        $sql ='INSERT into `votes` (up, down) VALUES (:up, :down);';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':up',$this->getUp());
        $sth->bindValue(':down',$this->getDown());
        return $sth->execute();
    }

    public static function readAll(){
        $sql = 'SELECT * FROM `votes`;';
        $sth = Database::getInstance()->query($sql);
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
  
    public function update($id){
        $sql = "UPDATE `votes` SET up = :up, down = :down WHERE id = :id";
        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':up',$this->getUp());
        $sth->bindValue(':down',$this->getDown());
        $sth->bindValue(':id',$id,PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function delete($id){
        $sql = 'DELETE FROM `votes` WHERE id = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        return $sth->execute();
    }
}
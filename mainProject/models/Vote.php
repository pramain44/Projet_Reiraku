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

    public function getId_mangas():int{
        return $this->id;
    }
    public function setId_mangas(int $id){
        return $this->id = $id;
    }

    public function getId_users():int{
        return $this->Id_users;
    }
    public function setId_users(int $Id_users){
        return $this->Id_users = $Id_users;
    }

    public function create($id, $Id_users){
        $sql ='INSERT into `votes` (up, down, Id_mangas, Id_users) VALUES (:up, :down,:id, :Id_users);';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':up',$this->getUp());
        $sth->bindValue(':down',$this->getDown());
        $sth->bindValue(':id',$this->getId_mangas());
        $sth->bindValue(':Id_users',$this->getId_users());
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

    // fction hors crud

    public static function exist($Id_users,$id){
        $sql = 'SELECT * from votes WHERE votes.Id_users = :Id_users AND votes.Id_mangas = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':Id_users',$Id_users);
        $sth->bindValue(':id',$id);
        $sth->execute();
        return $sth->fetch();
    }
    
    // fction pour count les votes

    public static function countUp($id){
        $sql = 'SELECT COUNT(up) FROM `votes` WHERE up = 1 AND votes.Id_mangas = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        $sth->execute();
        return $sth->fetchColumn();
    }

    public static function countDown($id){
        $sql = 'SELECT COUNT(down) FROM `votes` WHERE down = 1 AND votes.Id_mangas = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        $sth->execute();
        return $sth->fetchColumn();
    }
}
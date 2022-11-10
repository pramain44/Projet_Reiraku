<?php

class Comment{
    private string $comm_slots;

    private $created_at;

     // getter et setters de $comm_slots
    public function getComm_slots():string{
        return $this->comm_slots;
    }
    public function setComm_slots(string $comm_slots){
        return $this->comm_slots = $comm_slots;
    }

    // getter et setters de $created_at
    public function getCreated_at(){
        return $this->created_at;
    }
    public function setCreated_at($created_at){
        return $this->created_at = $created_at;
    }

    public function create(){
        $sql ='INSERT into `comments` (comm_slots, created_at) VALUES (:comm_slots, :created_at);';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':comm_slots',$this->getComm_slots());
        $sth->bindValue(':created_at',$this->created_at());
        return $sth->execute();
    }

    public static function readAll(){
        $sql = 'SELECT * FROM `comments`;';
        $sth = Database::getInstance()->query($sql);
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
  
    public function update($id){
        $sql = "UPDATE comments SET comm_slots = :comm_slots, created_at = :created_at WHERE id = :id";
        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':comm_slots',$this->getComm_slots());
        $sth->bindValue(':created_at',$this->getCreated_at());
        $sth->bindValue(':id',$id,PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function delete($id){
        $sql = 'DELETE FROM `comments` WHERE id = :id;'; // comments.id = :id ?
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        return $sth->execute();
    }
}
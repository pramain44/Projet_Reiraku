<?php

class Comment{
    private string $comm_slot;

    private int $Id_mangas;

    private int $Id_users;

    private $created_at;

     // getter et setters de $comm_slot
    public function getComm_slot():string{
        return $this->comm_slot;
    }
    public function setComm_slot(string $comm_slot){
        return $this->comm_slot = $comm_slot;
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

    // getter et setters de $created_at
    public function getCreated_at(){
        return $this->created_at;
    }
    public function setCreated_at($created_at){
        return $this->created_at = $created_at;
    }

    public function create($id, $Id_users){
        $sql ='INSERT into `comments` (comm_slot, Id_mangas, Id_users) VALUES (:comm_slot, :id, :Id_users);';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':comm_slot',$this->getComm_slot());
        $sth->bindValue(':id',$this->getId_mangas());
        $sth->bindValue(':Id_users',$this->getId_users());
        return $sth->execute();
    }

    public static function readAll(){
        $sql = 'SELECT * FROM `comments` JOIN `users` ON users.Id_users = comments.Id_users ORDER BY Id_comments DESC;';
        $sth = Database::getInstance()->query($sql);
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
  
    public function update($Id_comments){
        $sql = "UPDATE comments SET comm_slot = :comm_slot, Id_users = :Id_users, Id_mangas = :id WHERE Id_comments = :id";
        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':comm_slot',$this->getComm_slot());
        $sth->bindValue(':Id_users',$this->getId_users());
        $sth->bindValue(':Id_mangas',$this->getId_mangas());
        $sth->bindValue(':id',$Id_comments,PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function delete($Id_comments){
        $sql = 'DELETE FROM `comments` WHERE Id_comments = :id;'; 
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$Id_comments);
        return $sth->execute();
    }

    public static function CommentAndUser($id){
        $sql='SELECT comments.comm_slot, comments.created_at, comments.Id_users, users.name_account
        FROM `comments` JOIN `users` ON comments.Id_users = users.Id_users JOIN `mangas` ON mangas.Id_mangas = comments.Id_mangas
        WHERE mangas.Id_mangas = :id ORDER BY Id_comments DESC;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        $sth->execute();     
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function countComments($Id_users, $Id_mangas = ''){
        $sql = 'SELECT COUNT(*) FROM `comments` WHERE comments.Id_users = :Id_users';
        if($Id_mangas != ''){
            $sql .= ' AND comments.Id_mangas = :Id_mangas;';
        }
        $sql .= ';';
        $sth = Database::getInstance()->prepare($sql);
        if($Id_mangas != ''){
            $sth->bindValue(':Id_mangas',$Id_mangas); 
        }       
        $sth->bindValue(':Id_users',$Id_users);
        $sth->execute();
        return $sth->fetchColumn();
    }
}
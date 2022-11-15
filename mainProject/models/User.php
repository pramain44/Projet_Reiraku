<?php

class User{
    private int $id;

    private string $email;

    private string $name_account;

    private string $password;

    private $created_at;

    private $validated_at;

    // getter et setters d'id
    public function getId():int{
        return $this->id;
    }
    public function setId(string $id){
        return $this->id = $id;
    }

     // getter et setters de $mail
     public function getEmail():string{
        return $this->mail;
    }
    public function setEmail(string $email){
        return $this->email = $email;
    }

    // getter et setters de $name_account
    public function getName_account():string{
        return $this->name_account;
    }
    public function setName_account(string $name_account){
        return $this->name_account = $name_account;
    }

    // getter et setters de $password
    public function getPassword():string{
        return $this->password;
    }
    public function setPassword(string $password){
        return $this->password = $password;
    }

    // getter et setters de $created_at
    public function getCreated_at(){
        return $this->created_at;
    }
    public function setCreated_at($created_at){
        return $this->created_at = $created_at;
    }

    // getter et setters de $validated_at
    public function getValidated_at(){
        return $this->validated_at;
    }
    public function setValidated_at($validated_at){
        return $this->validated_at = $validated_at;
    }

    // ADD new User in the database
    public function create(){
        $sql ='INSERT into `users` (email, name_account, password, created_at, validated_at) VALUES (:email, :name_account, :password, :created_at, :validated_at);';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':email',$this->getEmail());
        $sth->bindValue(':name_account',$this->getName_account());
        $sth->bindValue(':password',$this->getPassword());
        $sth->bindValue(':created_at',$this->getCreated_at());
        $sth->bindValue(':validated_at',$this->getValidated_at());
        return $sth->execute();
    }

    // Update methods for Users in database
    public function update($id){
        $sql = "UPDATE users SET email = :email, name_account = :name_account, password = :password, created_at = :created_at, validated_at = :validated_at WHERE id = :id";
        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email',$this->getEmail());
        $sth->bindValue(':name_account',$this->getName_account());
        $sth->bindValue(':password',$this->getpassword());
        $sth->bindValue(':created_at',$this->getcreated_at());
        $sth->bindValue(':validated_at',$this->getvalidated_at());
        $sth->bindValue(':id',$id,PDO::PARAM_INT);
        return $sth->execute();
    }

    // All read method for Users
    public static function readAll(){
        $sql = 'SELECT * FROM `users`;';
        $sth = Database::getInstance()->query($sql);
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
    
    // All delete method for Users
    public static function delete($id){
        $sql = 'DELETE FROM `users` WHERE id = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        return $sth->execute();
    }
}

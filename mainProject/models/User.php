<?php

class User{
    private int $id;

    private int $role;

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

    public function getRole():int{
        return $this->role;
    }
    public function setRole(string $role){
        return $this->role = $role;
    }

     // getter et setters de $mail
     public function getEmail():string{
        return $this->email;
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
        $sql ='INSERT into `users` (email, name_account, password,role) VALUES (:email, :name_account, :password,:role);';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':email',$this->getEmail());
        $sth->bindValue(':name_account',$this->getName_account());
        $sth->bindValue(':password',$this->getPassword());
        $sth->bindValue(':role',$this->getRole());
        return $sth->execute();
    }

    // Update methods for Users in database
    public function update($Id_users){
        $sql = "UPDATE `users` SET name_account = :name_account WHERE Id_users = :Id_users";
        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_account',$this->getName_account());
        $sth->bindValue(':Id_users',$Id_users,PDO::PARAM_INT);
        return $sth->execute();
    }

    // All read method for Users
    public static function readAll($search){
        $sql = 'SELECT * FROM `users`';
        if($search != ''){
            $sql .= ' WHERE name_account LIKE :search OR email LIKE :search';
        }
        $sql .= ' ORDER BY created_at DESC;';
        $sth = Database::getInstance()->prepare($sql);
        if($search != ''){
            $sth->bindValue(':search','%'.$search.'%');
        }
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ); 
    }
    
    // All delete method for Users
    public static function delete($Id_users){
        $sql = 'DELETE FROM `users` WHERE Id_users = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$Id_users);
        return $sth->execute();
    }

    public static function getByEmail(string $email):object|bool{ 
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users` WHERE `email` = :email;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email',$email);
        if($sth->execute()){
            $result = $sth->fetch(PDO::FETCH_OBJ);
            if($result){
                return $result;
            }
        }
        return false;
    }
    public static function isMailExists(string $email): bool|object
    {
        $sql = 'SELECT * FROM `users` WHERE `email` = :email';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':email', $email, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch();
    }

    public static function upload($from,$filename,$extension,$to){
        $dst_x = 0;
        $dst_y = 0;
        $src_x = 0;
        $src_y = 0;
        $dst_width = 500;
        $src_width = getimagesize($to)[0];
        $src_height = getimagesize($to)[1];
        $dst_height = round(($dst_width * $src_height) / $src_width);
        $dst_image = imagecreatetruecolor($dst_width, $dst_height);
        $src_image = imagecreatefromjpeg($to);

        // Redimensionne
        imagecopyresampled(
            $dst_image,
            $src_image,
            $dst_x,
            $dst_y,
            $src_x,
            $src_y,
            $dst_width,
            $dst_height,
            $src_width,
            $src_height
        );

        // redimensionne l'image
        $resampledDestination = UPLOAD_USER_PROFILE . '/'.$filename.'_resampled.jpg';
        imagejpeg($dst_image, $resampledDestination, 75);

    }
}

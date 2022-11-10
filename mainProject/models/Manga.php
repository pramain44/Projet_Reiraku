<?php

class Manga {
    private int $id;

    private string $title;

    private string $description;

    private string $anime;

    private string $author;

    private string $categorie;

    private string $image;

    // getter, setter d'id
    public function getId():int{
        return $this->id;
    }
    public function setId(string $id){
        return $this->id = $id;
    }

    // getter setter $title
    public function getTitle():string{
        return $this->title;
    }
    public function setTitle(string $title){
        return $this->title = $title;
    }

    // getter setter $description
    public function getDescription():string{
        return $this->description;
    }
    public function setDescription(string $description){
        return $this->description = $description;
    }

    // getter setter $anime
    public function getAnime():string{
        return $this->anime;
    }
    public function setAnime(string $anime){
        return $this->anime = $anime;
    }

    // getter setter $authors
    public function getAuthors():string{
        return $this->authors;
    }
    public function setAuthors(string $authors){
        return $this->authors = $authors;
    }

    // getter setter $categorie
    public function getCategorie():string{
        return $this->categorie;
    }
    public function setCategorie(string $categorie){
        return $this->categorie = $categorie;
    }

    // getter setter $image
    public function getImage():string{
        return $this->image;
    }
    public function setImage(string $image){
        return $this->image = $image;
    }

    // ADD new manga in the database
    public function create(){
        $sql ='INSERT into `mangas` (title, description, anime, author, categorie, image) VALUES (:title, :description, :anime, :author, :categorie, :image);';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':title',$this->getTitle());
        $sth->bindValue(':description',$this->getDescription());
        $sth->bindValue(':anime',$this->getAnime());
        $sth->bindValue(':author',$this->getAuthor());
        $sth->bindValue(':categorie',$this->getCategorie());
        $sth->bindValue(':image',$this->getImage());
        return $sth->execute();
    }

    // UPDATE a manga in the database
    public function update($id){
        $sql = "UPDATE `mangas` SET title = :title, description = :description, anime = :anime, author = :author, categorie = :categorie, image = :image WHERE id = :id";
        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':lastname',$this->getLastname());
        $sth->bindValue(':firstname',$this->getFirstname());
        $sth->bindValue(':birthdate',$this->getBirthdate());
        $sth->bindValue(':phone',$this->getPhone());
        $sth->bindValue(':mail',$this->getMail());
        $sth->bindValue(':image',$this->getImage());
        $sth->bindValue(':id',$id,PDO::PARAM_INT);
        return $sth->execute();
    }

    // All read method of manga in the database
    public static function readAll($search){
        if($search == ''){
        $sql = 'SELECT * FROM `mangas`;';
        $sth = Database::getInstance()->query($sql);
        return $sth->fetchAll(PDO::FETCH_OBJ);
        }
        else{
        $sql ='SELECT * FROM `mangas` WHERE title = :search OR categorie = :search';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':search',$search);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    // All delete method of manga in the database
    public static function delete($id){
        $sql = 'DELETE FROM `mangas` WHERE id = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        return $sth->execute();
    }
}

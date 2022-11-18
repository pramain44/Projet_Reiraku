<?php

class Manga {
    private int $id;

    private string $title;

    private string $description;

    private string $anime;

    private string $idAuthors;

    private string $idCategories;

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
    public function getIdAuthors():string{
        return $this->authors;
    }
    public function setIdAuthors(string $authors){
        return $this->authors = $authors;
    }

    // getter setter $categorie
    public function getIdCategories():string{
        return $this->categorie;
    }
    public function setIdCategories(string $categorie){
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
        $sth->bindValue(':author',$this->getIdAuthor());
        $sth->bindValue(':categorie',$this->getIdCategorie());
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
    public static function readAll(string $search = '', $id = ''){
        $sql = 'SELECT * FROM `mangas` ';
        if($search != ''){
            $sql .= 'JOIN `authors` WHERE title LIKE :search OR firstname LIKE :search OR lastname LIKE :search OR categories LIKE :search';
        }else if($id != ''){
            $sql .= 'WHERE Id_mangas = :id';
        }
        $sql .= ';';
        $sth = Database::getInstance()->prepare($sql);
        if($search != ''){
            $sth->bindValue(':search','%'.$search.'%');
        }else if($id != ''){
            $sth->bindValue(':id',$id);
            $sth->execute();
           return $sth->fetch(PDO::FETCH_OBJ);
        }else{
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    // All delete method of manga in the database
    public static function delete($id){
        $sql = 'DELETE FROM `mangas` WHERE Id_mangas = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        return $sth->execute();
    }
}



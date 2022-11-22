<?php

class Author{
    private string $firstname;

    private string $lastname;

    private int $id;

     // getter et setters de $firstname
    public function getFirstname():string{
        return $this->firstname;
    }
    public function setFirstname(string $firstname){
        return $this->firstname = $firstname;
    }

    // getter et setters de $lastname
    public function getLastname(){
        return $this->lastname;
    }
    public function setLastname($lastname){
        return $this->lastname = $lastname;
    }
    public function getId():int{
        return $this->id;
    }
    public function setId(string $id){
        return $this->id = $id;
    }

    public static function readAll(string $search = ''){
        $sql = 'SELECT * FROM `authors` ';
        if($search != ''){
            $sql .= 'WHERE firstname LIKE :search OR lastname LIKE :search';
        }
        $sql .= ';';
        $sth = Database::getInstance()->prepare($sql);
        if($search != ''){
            $sth->bindValue(':search','%'.$search.'%');
        }
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function AuthorsInMangas($id){
        $sql='SELECT mangas.description, mangas.anime, mangas.title, mangas.image, authors.firstname, authors.lastname 
        FROM `mangas` JOIN authors ON mangas.Id_authors = authors.Id_authors WHERE mangas.Id_mangas = :id';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        $sth->execute();     
        return $sth->fetch(PDO::FETCH_OBJ);
    }

}




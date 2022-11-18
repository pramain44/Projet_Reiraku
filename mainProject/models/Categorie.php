<?php

class Categorie{
    private string $name;

    private int $id;

     // getter et setters de $name
    public function getname():string{
        return $this->name;
    }
    public function setname(string $name){
        return $this->name = $name;
    }
    public function getId():int{
        return $this->id;
    }
    public function setId(int $id){
        return $this->id = $id;
    }
    public static function readOne(int $id){
        $sql = 'SELECT categories.name FROM `categories` JOIN `mangas` ON mangas.Id_categories = categories.Id_categories WHERE Id_mangas = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public static function readAll($id = ''){
        $sql='SELECT mangas.title, mangas.image, mangas.Id_mangas,categories.name 
        FROM `mangas` JOIN `categories` ON mangas.Id_categories = categories.Id_categories';
        if($id != ''){
            $sql .= ' WHERE Id_mangas = :id';
        }
        $sql .= ';';
        $sth = Database::getInstance()->prepare($sql);
            if($id != ''){
            $sth->bindValue(':id',$id);
            $sth->execute();
            return $sth->fetch(PDO::FETCH_OBJ);
        }
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
}
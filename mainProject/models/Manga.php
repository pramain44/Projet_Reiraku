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
        $sql ='INSERT into `mangas` (title, description, anime, author, categorie, image) 
        VALUES (:title, :description, :anime, :author, :categorie, :image);';
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
        $sql = "UPDATE `mangas` 
        SET title = :title, description = :description, anime = :anime, author = :author, 
        categorie = :categorie, image = :image WHERE id = :id";
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
    public static function readAll(string $Id_users ='',$pages ='',$search = '', $id = '',){
        $sql = 'SELECT * FROM `mangas` ';
        if($search != ''){
            $sql .= 'JOIN `authors` 
            WHERE title LIKE :search OR firstname LIKE :search OR lastname LIKE :search OR categories LIKE :search';
        }if($id != ''){
            $sql .= 'WHERE Id_mangas = :id';
        }if(!empty($Id_users)){
            $sql .= 'JOIN `comments` ON comments.Id_mangas = mangas.Id_mangas 
            WHERE comments.Id_users = :Id_users LIMIT 5';
        }   
        $sql .= ';';
        $sth = Database::getInstance()->prepare($sql);
        if($search != ''){
            $sth->bindValue(':search','%'.$search.'%');
        }if($id != ''){
            $sth->bindValue(':id',$id);
            $sth->execute();
           return $sth->fetch(PDO::FETCH_OBJ);
        }
        if(!empty($Id_users)){
           $sth->bindValue(':Id_users',$Id_users);
           //$sth->bindValue(':pages',$pages);
           $sth->execute();
           return $sth->fetchAll(PDO::FETCH_OBJ);
        }
        
        else{
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public static function pagination($Id_users,$pages){
        $sql = 'SELECT * FROM `mangas` 
        JOIN `comments` ON comments.Id_mangas = mangas.Id_mangas 
        WHERE comments.Id_users = :Id_users 
        LIMIT 5 OFFSET :pages;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':Id_users',$Id_users);
        $sth->bindValue(':pages',$pages);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    // All delete method of manga in the database
    public static function delete($id){
        $sql = 'DELETE FROM `mangas` WHERE Id_mangas = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id',$id);
        return $sth->execute();
    }

    public static function Select(string $search){
        $sql = 'SELECT mangas.title, mangas.image, mangas.Id_mangas,categories.name 
        FROM `mangas` JOIN `categories` ON mangas.Id_categories = categories.Id_categories';
        if($search != ''){
            $sql .= ' WHERE title LIKE :search OR name LIKE :search';
        }
        $sql .= ' ORDER BY title;';
        $sth = Database::getInstance()->prepare($sql);
        if($search != ''){
            $sth->bindValue(':search','%'.$search.'%');
        }
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);        
    }


    // public static function count(){
    //     $sql = 'SELECT COUNT(*) FROM `mangas`;';
    //     $sth = Database::getInstance()->query($sql);
    //     return $sth->fetchColumn();
    // }


    public static function getAll(?string $search = '', int $limit = null, int $offset = 0): array // Méthode statique car il est inutile d'instancier, car pas d'hydratation
    {

        // On stocke une instance de la classe PDO dans une variable
        $pdo = Database::getInstance();

        // On créé la requête
        $sql = 'SELECT * FROM `mangas` 
                    WHERE `title` LIKE :search';

        if (!is_null($limit)) {
            $sql .= ' LIMIT :limit OFFSET :offset';
        }

        $sql .= ';';

        // On prépare la requête
        $sth = Database::getInstance()->prepare($sql);

        // On associe le marqueur nominatif à la valeur de search
        $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);

        // On associe les marqueurs nominatifs aux valeurs de offset et limit
        if (!is_null($limit)) {
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
            $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        }

        if ($sth->execute()) {
            return ($sth->fetchAll(PDO::FETCH_OBJ));
        } else {
            return [];
        }
    }
        public static function count(string $s): int
    {
        $sql = 'SELECT COUNT(`Id_mangas`) as `nbMangas` FROM `mangas`
                    WHERE `title` LIKE :search';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':search', '%' . $s . '%', PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetchColumn();

    }
    
  
}



<?php
require_once __DIR__.'/../../helpers/database.php';
require_once __DIR__.'/../../models/Author.php';
require_once __DIR__.'/../../models/Categorie.php';
require_once __DIR__.'/../../models/User.php';


User::check();


$id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
if($id == 0){
    header('location:http://projet_2.0.localhost/mainProject/404.php');
    exit();
}
try{
    $authors = Author::AuthorsInMangas($id);
    $categories = Categorie::readOne($id);
    $title = $authors->title;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $error = [];
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($title)){
            $error['title'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($title,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['title'] = 'la donnée n\'est pas conforme';
            }
        }
        $anime = trim(filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($anime)){
        $error['anime'] = 'ce champ est obligatoire';
        }

        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($description)){
        $error['description'] = 'ce champ est obligatoire';
        }
        
        $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($lastname)){
            $error['lastname'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($lastname,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['lastname'] = 'la donnée n\'est pas conforme';
            }
        }
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($firstname)){
            $error['firstname'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($firstname,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['firstname'] = 'la donnée n\'est pas conforme';
            }
        }
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($name)){
            $error['name'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($name,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['name'] = 'la donnée n\'est pas conforme';
            }
        }

        // gestion de l'image
        if (!isset($_FILES['image'])) {
            throw new Exception('Fichier vide');
        }

        if ($_FILES['image']['error'] != 0) {
            throw new Exception('Erreur :'.$_FILES['image']['error']);
        }

        if (!in_array($_FILES['image']['type'], SUPPORTED_FORMATS)) {
            throw new Exception('Format non autorisé (jpeg seulement)');
        }

        if ($_FILES['image']['size'] > MAX_SIZE) {
            throw new Exception('Poids supérieur à la limite (5Mo)');
        }

        $from = $_FILES['image']['tmp_name'];
        $filename = $title; 
        $extension = $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $to = UPLOAD_MANGAS_IMAGE . $filename . '.' . $extension;

        if (!move_uploaded_file($from, $to)) {
            throw new Exception('problème lors du transfert');
        }

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
    $resampledDestination = UPLOAD_MANGAS_IMAGE . '/'.$filename.'_resampled.jpg';
    imagejpeg($dst_image, $resampledDestination, 85); 


        if(empty($error)){
            $sql = 'BEGIN;
            UPDATE `categories` JOIN `mangas` ON mangas.Id_categories = categories.Id_categories SET name = :name WHERE Id_mangas = :id;
            UPDATE `authors` JOIN `mangas` ON mangas.Id_authors = authors.Id_authors SET firstname = :firstname, lastname = :lastname WHERE Id_mangas = :id;
            UPDATE `mangas` SET description = :description, anime = :anime, title = :title, image = :resampledDestination WHERE Id_mangas = :id;
            COMMIT;';
            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':lastname',$lastname);
            $sth->bindValue(':firstname',$firstname);
            $sth->bindValue(':name',$name);
            $sth->bindValue(':description',$description);
            $sth->bindValue(':anime',$anime);
            $sth->bindValue(':title',$title);
            $sth->bindValue(':resampledDestination',$resampledDestination);
            $sth->bindValue(':id',$id);
            $response = $sth->execute();
            if($response){
                SessionFlash::set('Modification appliqué');
                header('location: /mainProject/controllers/dashboardControllers/listMangasController.php');
                exit();
            }
        }
    }

}catch(PDOException $e){
    die('error'.$e->getMessage());
}

include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/dashboardViews/editMangas.php';
include __DIR__.'/../../views/templates/dashboardFooter.php';
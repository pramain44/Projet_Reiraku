<?php
require_once(__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../models/Manga.php');
require_once(__DIR__.'/../../models/User.php');


User::check();


$title = 'Formulaire D\'ajout';
$id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));

try{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $error = [];
        $title = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
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
        }//else{
        // $isOk = filter_var($anime,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
        //     if($isOk == false){
        //     $error['anime'] = 'la donnée n\'est pas conforme';
        //     }
        // }
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($description)){
        $error['description'] = 'ce champ est obligatoire';
        }//else{
        // $isOk = filter_var($description,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_WHATEVER.'/')));
        //     if($isOk == false){
        //     $error['description'] = 'la donnée n\'est pas conforme';
        //     }
        // }
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
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($image)){
            $error['image'] = 'ce champ est obligatoire';
        }
        //else{
        //     $isOk = filter_var($image,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_WHATEVER.'/')));
        //     if($isOk == false){
        //         $error['image'] = 'la donnée n\'est pas conforme';
        //     }
        // }
        


        if(empty($error)){
            $sql = 'BEGIN;
            INSERT INTO `categories` (name) VALUES (:name);
            INSERT INTO `authors` (firstname, lastname) VALUES (:firstname, :lastname);
            INSERT INTO `mangas` (description, anime, title, image, Id_authors,Id_categories) VALUES (:description, :anime, :title, :image,@authors_id:=LAST_INSERT_ID(),LAST_INSERT_ID());
            COMMIT;';
            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':lastname',$lastname);
            $sth->bindValue(':firstname',$firstname);
            $sth->bindValue(':name',$name);
            $sth->bindValue(':description',$description);
            $sth->bindValue(':anime',$anime);
            $sth->bindValue(':title',$title);
            $sth->bindValue(':image',$image);
            $response = $sth->execute();
            if($response){
                SessionFlash::set('Manga Ajouter');
                header('location: /mainProject/controllers/dashboardControllers/createMangasController.php');
                exit();
            }
        }
    }

}catch(PDOException $e){
     die('error'.$e->getMessage());
}

include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/dashboardViews/createMangas.php';
include __DIR__.'/../../views/templates/dashboardFooter.php';







<?php
require_once(__DIR__.'/../../config/data.php');
require_once(__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../models/Manga.php');


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
        $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($author)){
        $error['author'] = 'ce champ est obligatoire';
        }else{
        $isOk = filter_var($author,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
            $error['author'] = 'la donnée n\'est pas conforme';
            }
        }
        $categorie = trim(filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($categorie)){
        $error['categorie'] = 'ce champ est obligatoire';
        }else{
        $isOk = filter_var($categorie,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
            $error['categorie'] = 'la donnée n\'est pas conforme';
            }
        }
        $anime = trim(filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($anime)){
        $error['anime'] = 'ce champ est obligatoire';
        }else{
        $isOk = filter_var($anime,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
            $error['anime'] = 'la donnée n\'est pas conforme';
            }
        }
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($description)){
        $error['description'] = 'ce champ est obligatoire';
        }else{
        $isOk = filter_var($description,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_WHATEVER.'/')));
            if($isOk == false){
            $error['description'] = 'la donnée n\'est pas conforme';
            }
        }
        $title = $_POST['title'];
        $author = $_POST['author'];   
        $categorie = $_POST['categorie'];
        $anime = $_POST['anime'];
        $description = $_POST['description'];
        
        if(empty($error)){
            $manga = new Manga();
            $manga->setLastname($title);
            $manga->setFirstname($author);
            $manga->setBirthdate($categorie);
            $manga->setPhone($anime);
            $manga->setMail($description);
            //la methode(function) de la classe patient(requete sql)
            $response = $manga->create();
            if($response){
                SessionFlash::set('Le manga a bien été ajouté a la base de donnée');
                header('location: /controllers/patients_list_controller.php');
                exit();
            }
        }
    }

}catch(PDOException $e){
     die('error'.$e->getMessage());
}

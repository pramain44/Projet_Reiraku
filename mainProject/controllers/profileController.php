<?php
require_once(__DIR__.'/../helpers/database.php');
require_once(__DIR__.'/../models/User.php');
require_once(__DIR__.'/../models/Comment.php');
require_once(__DIR__.'/../models/Manga.php');



if(!isset($_SESSION['user'])){
    SessionFlash::set('Il faut un compte pour acceder au profile');
    header('location: http://projet_2.0.localhost/mainProject/controllers/connectionController.php');
    exit;
}

$pages = intval(filter_input(INPUT_GET,'pages',FILTER_SANITIZE_NUMBER_INT));
$Id_users = $_SESSION['user']->Id_users;

$mangas  = Manga::readAll($Id_users); 
$commentsNb = Comment::countComments($Id_users);
if(!empty($_GET['pages'])){
    $mangas = Manga::pagination($Id_users,$pages);  
    }


if($_SERVER['REQUEST_METHOD'] == 'POST'){
// if(!empty($_FILES['profilPic']['tmp_name'])){
//     if($_FILES['profilPic']['error'] != 0){
//         $errormsg['upload'] = 'erreur';
//     }
//     $mimetype = $_FILES['profilPic']['type'];
//     if($mimetype != 'image/jpeg/png' && $mimetype != ''){
//         $errormsg['upload'] = 'pas le bon type de fichier (jpeg)';
//     }if($_FILES['profilPic']['size'] > $maxFileSize){
//         $errormsg['upload'] ='trop lourd (2Mo max)';
//     }
// }
    $name_account = trim(filter_input(INPUT_POST, 'name_account', FILTER_SANITIZE_SPECIAL_CHARS));
    if(empty($name_account)){
        $error['inscription'] = 'ce champ est obligatoire';
    }else{
        $isOk = filter_var($name_account,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_WHATEVER.'/')));
        if($isOk == false){
            $error['inscription'] = 'la donnée n\'est pas conforme';
        }
    }
    if(empty($error)){
        $user = new User();
        $user->setName_account($name_account);
        $user = $user->update($Id_users);
        if($user){
            SessionFlash::set('Modification prise en compte, Il faut se deconnecter/reconnecter pour finaliser la procedure');
            header('Location: http://projet_2.0.localhost/mainProject/controllers/profileController.php');
            exit;
        }
    }
    
}
// appelle du front (html)
include(__DIR__.'/../views/profile.php');
include(__DIR__.'/../views/templates/footer.php');

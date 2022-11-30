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
// if($pages == 0){
//     header('location:http://projet_2.0.localhost/mainProject/404.php');
//     exit();
// }
$Id_users = $_SESSION['user']->Id_users;

$mangas  = Manga::readAll($Id_users); 
$commentsNb = Comment::countComments($Id_users);
if(!empty($_GET['pages'])){
    $mangas = Manga::pagination($Id_users,$pages);  
    }


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['test'] == 2){
        try {
            if (!isset($_FILES['profile'])) {
                throw new Exception('Erreur !');
            }

            if ($_FILES['profile']['error'] != 0) {
                throw new Exception('Erreur :'.$_FILES['profile']['error']);
            }

            if (!in_array($_FILES['profile']['type'], SUPPORTED_FORMATS)) {
                throw new Exception('Format non autorisé (jpeg seulement)');
            }

            if ($_FILES['profile']['size'] > MAX_SIZE) {
                throw new Exception('Poids supérieur à la limite (5Mo)');
            }

            $from = $_FILES['profile']['tmp_name'];
            $filename = $Id_users; //$user->id.'.jpg';
            $extension = $extension = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
            $to = UPLOAD_USER_PROFILE . $filename . '.' . $extension;

            if (!move_uploaded_file($from, $to)) {
                throw new Exception('problème lors du transfert');
            }

            User::upload($from,$filename,$extension,$to);

            

        } catch (\Exception $e) {
            $error = $e->getMessage();
        }
    }

    if($_POST['test'] == 3){
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
}
// appelle du front (html)
include(__DIR__.'/../views/profile.php');
include(__DIR__.'/../views/templates/footer.php');

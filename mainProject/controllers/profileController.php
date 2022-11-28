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
//throw new Exception('erreur lors de l'upload')
// if(!in_array($_Files['profile']['type'], IMAGE_TYPES)) IMAGE_TYPE = image/jpg in array test le 1er tablo appartient au deuxieme
//
//$filename = $_Session['user']->Id_users; mettre comme nom l'id du user (car photo  de profil)
//$extension = pathinfo($files['profile]['name'], PATHINFO_EXTENSION) ;
//$from = $files[profile][tmp_name];
//$to = __DIR__.'/public/upload/users/'.$filename.'.'.$extension;
//if(!move_uploaded_file($from,$to){
//  throw new Exception ('probleme lors du transfert')    
//
//
//          partie compression de l'image
// voir imagecopyresampled() sur la doc php
//
//        int $dst_x = 0;
//        int $dst_y = 0;
//        int $src_x = 0;
//        int $src_y = 0;
//        int $dst_width = 500;
//        int $src_width = getimagesize($to)[0];
//        int $src_height = getimagesize($to)[1];
//        int $dst_height = ceil($src_height*dst_width/$src_width);   
//
//$src_image = imagecreatefromjpeg($to);
//$dst_image = imagecreatetruecolor($dst_width,$dst_height)
//$size = getimagesire($to,)
//
// imagecopyresampled(
//     GdImage $dst_image,
//     GdImage $src_image,
//     int $dst_x,
//     int $dst_y,
//     int $src_x,
//     int $src_y,
//     int $dst_width,
//     int $dst_height,
//     int $src_width,
//     int $src_height
// ): bool
//
// $fileresampled = '12-resampled';
//$toresampled = __DIR__.'/public/upload/users/'.$filename.'.'.$extension;
//imagejpeg($dst_image,$to,0);
//}


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

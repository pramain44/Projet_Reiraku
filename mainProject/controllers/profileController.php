<?php
require_once(__DIR__.'/../helpers/database.php');
require_once(__DIR__.'/../models/User.php');

if(!isset($_SESSION['user'])){
    header('location: http://projet_2.0.localhost/mainProject/controllers/connectionController.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
if(!empty($_FILES['profilPic']['tmp_name'])){
    if($_FILES['profilPic']['error'] != 0){
        $errormsg['upload'] = 'erreur';
    }
    $mimetype = $_FILES['profilPic']['type'];
    if($mimetype != 'image/jpeg/png' && $mimetype != ''){
        $errormsg['upload'] = 'pas le bon type de fichier (jpeg)';
    }if($_FILES['profilPic']['size'] > $maxFileSize){
        $errormsg['upload'] ='trop lourd (2Mo max)';
    }
}
}
// appelle du front (html)
include(__DIR__.'/../views/profile.php');
include(__DIR__.'/../views/templates/footer.php');

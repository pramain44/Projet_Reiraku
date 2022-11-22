<?php
require_once(__DIR__.'/../helpers/database.php');
require_once(__DIR__.'/../models/User.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = [];
    //$errors = [];

    $password = filter_input(INPUT_POST,'password');
   
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if(empty($email)){
        $error['email'] = 'ce champ est obligatoire';
    }else{
        $isOk = filter_var($email,FILTER_VALIDATE_EMAIL);
        if($isOk == false){
            $error['email'] = 'l\'email n\'est pas conforme';
        }   
    }

    if(empty($error)){
    $user = User::getByEmail($email);
    //$password_hash = $user->getPassword();
    $password_hash = $user->password;
    $result = password_verify($password, $password_hash); // pwd qui a été tapé comparé au pwd en bdd (user->pwd)
    if(!$result){
        $error['password'] = 'Les informations de connexion ne sont pas bonnes!';
    }
    }
    if(empty($error)){
        //$user->setPassword(null);
        $user->password = null;
        $_SESSION['user'] = $user;
        header('Location: http://projet_2.0.localhost/mainProject/controllers/homeController.php');
        exit;
    }
}
// appelle du front (html)
include(__DIR__.'/../views/connection.php');


<?php
require_once(__DIR__.'/../helpers/database.php');
require_once(__DIR__.'/../models/User.php');
require_once(__DIR__.'/../helpers/JWT.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        if(empty($email)){
            $error['email'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($email,FILTER_VALIDATE_EMAIL);
            if($isOk == false){
                $error['email'] = 'l\'email n\'est pas conforme';
            }
    }
    if(empty($error)){
        $element = ['email'=> $email];
        $element['valid'] = time() + 60*10;
        $token = JWT::set($element);
        $to = $email;
        $subject = 'Changement de mdp !';
        $message = 'cliquer pour changer votre mdp : <a href="'.$_SERVER['HTTP_ORIGIN'].'/mainProject/controllers/passwordChangingController.php?token='.$token.'">Cliquez-ici</a>';
        mail($to,$subject,$message);          
    }
}

include(__DIR__.'/../views/passwordForgotten.php');

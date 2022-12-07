<?php
require_once(__DIR__.'/../helpers/database.php');
require_once(__DIR__.'/../models/User.php');
require_once(__DIR__.'/../helpers/JWT.php');



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $token = filter_input(INPUT_GET, 'token');
    $element = JWT::get($token);
    
    $password = filter_input(INPUT_POST, 'password');
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

    if($password != $confirmPassword){
        $error['password'] = 'Les mots de passe doivent être identiques';
    } else {
        if(empty($password)){
            $error['password'] = 'Le mot de passe est obligatoire';
        }
    }
    if(empty($error)){
    $password = password_hash($password, PASSWORD_DEFAULT);

    $user = User::update($Id_users,$password); // a modifié methode du profile en non static
    }
}


include(__DIR__.'/../views/passwordChanging.php');

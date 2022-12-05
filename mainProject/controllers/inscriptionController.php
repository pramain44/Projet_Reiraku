<?php
require_once(__DIR__.'/../helpers/database.php');
require_once(__DIR__.'/../models/User.php');



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = [];
    $name_account = trim(filter_input(INPUT_POST, 'name_account', FILTER_SANITIZE_SPECIAL_CHARS));
    if(empty($name_account)){
        $error['inscription'] = 'ce champ est obligatoire';
    }else{
        $isOk = filter_var($name_account,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_WHATEVER.'/')));
        if($isOk == false){
            $error['inscription'] = 'la donnée n\'est pas conforme';
        }
    }

    $role = intval(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS));
    if(empty($role)){
        $error['inscription'] = 'ouga bouga';
    }else{
        $isOk = filter_var($role,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_ROLE.'/')));
        if($isOk == false){
            $error['inscription'] = 'la donnée n\'est pas conforme';
        }
    }

    $consent = intval(filter_input(INPUT_POST, 'consent', FILTER_SANITIZE_SPECIAL_CHARS));
    if(empty($consent)){
        $error['CGU'] = 'les CGU doivent être lu et acceptés';
    }else{
        $isOk = filter_var($consent,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_ROLE.'/')));
        if($isOk == false){
            $error['CGU'] = 'la donnée n\'est pas conforme';
        }
    }
    
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if(empty($email)){
        $error['email'] = 'Ce champ est obligatoire';
    }else{
        $isOk = filter_var($email,FILTER_VALIDATE_EMAIL);
        if($isOk == false){
            $error['email'] = 'l\'email n\'est pas conforme';
        }
        if(User::isMailExists($email)){
            $errors['mail'] = 'Ce mail existe déjà';
        }
    }
    
    $password = filter_input(INPUT_POST, 'password');
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

    if($password != $confirmPassword){
        $error['password'] = 'Les mots de passe doivent être identiques';
    } else {
        if(empty($password)){
            $error['password'] = 'Le mot de passe est obligatoire';
        }
    }

    $password = password_hash($password, PASSWORD_DEFAULT);


    if(empty($error)){
        $user = new User();
        $user->setName_account($name_account);
        $user->setPassword($password);
        $user->setEmail($email);
        $user->setRole($role);
        $user = $user->create();
        if($user){
            SessionFlash::set('Le compte a bien été crée, vous pouvez vous connectez');
            header('Location:homeController.php');
            exit;
        }
    }
}
// appelle du front (html)
include(__DIR__.'/../views/inscription.php');
include(__DIR__.'/../views/templates/footer.php');


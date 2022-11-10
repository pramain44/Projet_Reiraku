<?php
require(__DIR__.'/../config/data.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameAccount = trim(filter_input(INPUT_POST, 'nameAccount', FILTER_SANITIZE_SPECIAL_CHARS));
    if(empty($nameAccount)){
        $error['inscription'] = 'ce champ est obligatoire';
    }else{
        $isOk = filter_var($nameAccount,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_WHATEVER.'/')));
        if($isOk == false){
            $error['inscription'] = 'la donnée n\'est pas conforme';
        }
    }
    $password = filter_input(INPUT_POST,'password');
    $confirmPassword = filter_input(INPUT_POST,'confirmPassword');
    if(empty($password)){
        $error['password'] = 'veuillez rentrer un mot de passe';
    }
    else{
        if($confirmPassword != $password){
        $error['password'] = 'mot de passe different';
    }elseif($isokpassword == true){
        password_hash($password, PASSWORD_DEFAULT);
    }
    }
    $emailAddress = trim(filter_input(INPUT_POST, 'emailAddress', FILTER_SANITIZE_EMAIL));
        if(empty($emailAddress)){
            $error['email'] = 'Ce champ est obligatoire';
        }else{
            $isOk = filter_var($emailAddress,FILTER_VALIDATE_EMAIL);
            if($isOk == false){
                $error['email'] = 'l\'email n\'est pas conforme';
            }
    }
}
// appelle du front (html)
include(__DIR__.'/../views/inscription.php');
include(__DIR__.'/../views/templates/footer.php');

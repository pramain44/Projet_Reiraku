<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$emailAddress = trim(filter_input(INPUT_POST, 'emailAddress', FILTER_SANITIZE_EMAIL));
        if(empty($emailAddress)){
            $error['email'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($emailAddress,FILTER_VALIDATE_EMAIL);
            if($isOk == false){
                $error['email'] = 'l\'email n\'est pas conforme';
            }
    }
}

include(__DIR__.'/../views/passwordForgotten.php');

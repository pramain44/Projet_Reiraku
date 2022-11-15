<?php
require_once(__DIR__.'/../../config/data.php');
require_once(__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../helpers/sessionFlash.php');
require_once(__DIR__.'/../../models/User.php');

try{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $error = [];
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        if(empty($email)){
            $error['email'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($email,FILTER_VALIDATE_EMAIL);
            if($isOk == false){
                $error['email'] = 'la donnée n\'est pas conforme';
            }
        }
        $name_account = trim(filter_input(INPUT_POST, 'name_account', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($name_account)){
        $error['name_account'] = 'ce champ est obligatoire';
        }else{
        $isOk = filter_var($name_account,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
            $error['name_account'] = 'la donnée n\'est pas conforme';
            }
        }
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($password)){
        $error['password'] = 'ce champ est obligatoire';
        }else{
        $isOk = filter_var($password,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_WHATEVER.'/')));
            if($isOk == false){
            $error['password'] = 'la donnée n\'est pas conforme';
            }
        }
        $created_at = trim(filter_input(INPUT_POST, 'created_at', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($created_at)){
            $error['created_at'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($created_at,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['created_at'] = 'la donnée n\'est pas conforme';
            }
        }
        $validated_at = trim(filter_input(INPUT_POST, 'validated_at', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($validated_at)){
            $error['validated_at'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($validated_at,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['validated_at'] = 'la donnée n\'est pas conforme';
            }
        }
        
        
        $email = $_POST['email'];
        $name_account = $_POST['name_account']; 
        $password = $_POST['password'];
        $created_at = $_POST['created_at'];   
        $validated_at = $_POST['validated_at'];


        if(empty($error)){
           $user = new User();
           $user->setEmail($email);
           $user->setName_account($name_account);
           $user->setPassword($password);
           $user->setCreated_at($created_at);
           $user->setValidated_at($validated_at);
           $response = $user->create();
            if($response){
                SessionFlash::set('L\'utilisateur a bien été ajouté');
                header('location: /controllers/patients_list_controller.php');
                exit();
            }
        }
    }

}catch(PDOException $e){
     die('error'.$e->getMessage());
}

include __DIR__.'/../../views/dashboardViews/createMangas.php';
<?php
require_once (__DIR__.'/../helpers/database.php');
require_once(__DIR__.'/../models/User.php');



$Id_users = intval(filter_input(INPUT_GET,'Id_users',FILTER_SANITIZE_NUMBER_INT));


$deletedUser = User::delete($Id_users);


if($Id_users){
    SessionFlash::set('Votre compte a bien été supprimé');
    header('location: signOut.php');
    exit();
}


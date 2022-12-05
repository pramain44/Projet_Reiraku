<?php
require_once (__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../models/Manga.php');
require_once(__DIR__.'/../../models/User.php');
require_once(__DIR__.'/../../models/Comment.php');

// on récupere l'id 

$id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
$Id_comments = intval(filter_input(INPUT_GET,'Id_comments',FILTER_SANITIZE_NUMBER_INT));
$Id_users = intval(filter_input(INPUT_GET,'Id_users',FILTER_SANITIZE_NUMBER_INT));

// on supprime avec la fonction statique

$deleted = Manga::delete($id);
$deletedComm = Comment::delete($Id_comments);
$deletedUser = User::delete($Id_users);
var_dump($id);
var_dump($Id_users);
var_dump($Id_comments);
if($id){
    SessionFlash::set('La suppression a fonctionné');
    header('location: listMangasController.php');
    exit();
}

if($Id_users){
    SessionFlash::set('La suppression a fonctionné');
    header('location: listUsersController.php');
    exit();
}

if($Id_comments){
    SessionFlash::set('La suppression a fonctionné');
    header('location: listCommentsController.php');
    exit();
} 



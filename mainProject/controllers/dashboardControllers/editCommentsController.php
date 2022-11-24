<?php
require_once __DIR__.'/../../helpers/database.php';
require_once __DIR__.'/../../models/Comment.php';
require_once __DIR__.'/../../models/User.php';


$title ='Modifier Commentaire';

$Id_comments = intval(filter_input(INPUT_GET,'Id_comments',FILTER_SANITIZE_NUMBER_INT));
$Id_users = intval(filter_input(INPUT_GET,'Id_$Id_users',FILTER_SANITIZE_NUMBER_INT));
$id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));


try{
    $users = User::userReadAll($Id_user); // fonction a faire pour associer le user au comm
    $comment = Comment::readOne($id); // fction a faire pour lire 1 comm
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $comm_slot = trim(filter_input(INPUT_POST, 'comm_slot', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($comm_slot)){
            $error = 'écrivez quelques choses pour commenter';
        }
        if(empty($error)){
            $comment = new Comment();
            $comment->setComm_slot($comm_slot);
            $comment->setId_mangas($id);
            $comment->setId_users($Id_users);
            $comment = $comment->update($Id_comments);
        }
    
    }



}catch(PDOException $e){
    die('error'.$e->getMessage());
}
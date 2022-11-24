<?php
require_once __DIR__.'/../helpers/database.php';
require_once __DIR__.'/../models/Author.php';
require_once __DIR__.'/../models/Comment.php';

$id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
$Id_users = $_SESSION['user']->Id_users;


$mangas = Author::AuthorsInMangas($id);
$comments = Comment::CommentAndUser($id);



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
        $comment = $comment->create($id, $Id_users);
    }

}

// appelle du front (html)
include(__DIR__.'/../views/fiche.php');
include(__DIR__.'/../views/templates/footer.php');

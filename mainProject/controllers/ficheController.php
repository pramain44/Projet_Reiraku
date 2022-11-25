<?php
require_once __DIR__.'/../helpers/database.php';
require_once __DIR__.'/../models/Author.php';
require_once __DIR__.'/../models/Comment.php';
require_once __DIR__.'/../models/Vote.php';

// géré le get pour que si on change ça fasse pas d'erreur

$id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
if(!empty($_SESSION['user']->Id_users)){
    $Id_users = $_SESSION['user']->Id_users;
}

// var_dump($_POST['down']);
$upVotes = Vote::countUp($id);
$downVotes = Vote::countDown($id);
$mangas = Author::AuthorsInMangas($id);
$comments = Comment::CommentAndUser($id);
// if(Id_user exist() pas de vote)

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['vote'] == 2){
        $comm_slot = trim(filter_input(INPUT_POST, 'comm_slot', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($comm_slot)){
            $error['comm'] = 'écrivez quelques choses pour commenter';
        }
        if(empty($error)){
            $comment = new Comment();
            $comment->setComm_slot($comm_slot);
            $comment->setId_mangas($id);
            $comment->setId_users($Id_users);
            $comment = $comment->create($id, $Id_users);
        }
    }
    if($_POST['vote'] == 3){
        if(Vote::exist($Id_users,$id)){
            $error['vote'] = 'Vous avez déjà voté pour ce manga';
        }else{
            $up = intval((filter_input(INPUT_POST, 'up', FILTER_SANITIZE_NUMBER_INT)));
            if(empty($up)){
                $up = 0;
            }else{
                $isOk = filter_var($up,FILTER_VALIDATE_INT);
                if($isOk == false){
                    $error['vote'] = 'error';
                }
            }
            $down = intval((filter_input(INPUT_POST, 'down', FILTER_SANITIZE_NUMBER_INT)));
            if(empty($down)){
                $down = 0;
            }else{
                $isOk = filter_var($down,FILTER_VALIDATE_INT);
                if($isOk == false){
                    $error['vote'] = 'error';
                }
            }
            if(empty($error)){
                $votes = new Vote();
                $votes->setdown($down);
                $votes->setUp($up);
                $votes->setId_mangas($id);
                $votes->setId_users($Id_users);
                $votes = $votes->create($id, $Id_users);
            }
        }
    }

}

// appelle du front (html)
include(__DIR__.'/../views/fiche.php');
include(__DIR__.'/../views/templates/footer.php');

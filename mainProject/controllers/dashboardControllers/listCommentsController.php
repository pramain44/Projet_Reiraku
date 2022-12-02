<?php
require_once(__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../models/User.php');
require_once(__DIR__.'/../../models/Comment.php');

User::check();

$title ='Listes des commentaires';
try{
    $comments = Comment::readAll();

}catch(PDOException $e){
     die('error'.$e->getMessage());
}

include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/dashboardViews/listComments.php';
include __DIR__.'/../../views/templates/dashboardFooter.php';
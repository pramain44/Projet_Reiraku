
<?php
require_once(__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../models/User.php');
require_once(__DIR__.'/../../models/Comment.php');

$title ='Listes des utilisateurs';

try{
    $users = User::readAll();

}catch(PDOException $e){
     die('error'.$e->getMessage());
}

include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/dashboardViews/listUsers.php';
include __DIR__.'/../../views/templates/dashboardFooter.php';

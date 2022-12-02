
<?php
require_once(__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../models/User.php');
require_once(__DIR__.'/../../models/Comment.php');

User::check();

$title ='Listes des utilisateurs';
$search = trim((string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));

try{
    $users = User::readAll($search);

}catch(PDOException $e){
     die('error'.$e->getMessage());
}

include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/dashboardViews/listUsers.php';
include __DIR__.'/../../views/templates/dashboardFooter.php';

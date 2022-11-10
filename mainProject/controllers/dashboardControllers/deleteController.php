<?php
require_once __DIR__.'/../helpers/database.php';
require_once(__DIR__.'/../models/Manga.php');
require_once(__DIR__.'/../models/User.php');

$id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
$deleted = Manga::delete($id);
if($deleted){
    SessionFlash::set('Le RDV a été supprimé');
    header('location: /controllers/appointement_list_controller.php');
    exit();
}else{
    SessionFlash::set('error');
}
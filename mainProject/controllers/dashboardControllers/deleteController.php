<?php
require_once (__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../models/Manga.php');
require_once(__DIR__.'/../../models/User.php');
require_once (__DIR__.'/../../helpers/sessionFlash.php');


$id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
$deleted = Manga::delete($id);
if($deleted){
    SessionFlash::set('Le Manga a été supprimé');
    header('location: /controllers/dashboardControllers/listMangasController.php');
    exit();
}else{
    SessionFlash::set('error');
}
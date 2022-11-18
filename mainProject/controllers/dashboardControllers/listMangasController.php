<?php
require_once __DIR__.'/../../config/data.php';
require_once __DIR__.'/../../helpers/database.php';
require_once __DIR__.'/../../models/Manga.php';
require_once __DIR__.'/../../models/Author.php';
//require_once __DIR__.'/../../helpers/sessionFlash.php';


$title ='Mangas Liste';

try{
    //$x = Manga::count();
    $pages = intval(filter_input(INPUT_GET,'pages',FILTER_SANITIZE_NUMBER_INT));
    $id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
    $mangas = Manga::readAll($search = ''); // read with limits
    //$authors = Author::readAll($search = '');

    if(!empty($_GET['pages'])){
    $mangas = Manga::readAll($pages); // read with limits and offset (pages)
    }

}catch(PDOException $e){
    die('error'.$e->getMessage());
}

include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/dashboardViews/listMangas.php';
include __DIR__.'/../../views/templates/dashboardFooter.php';
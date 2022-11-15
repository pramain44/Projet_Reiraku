<?php
require_once __DIR__.'/../../config/data.php';
require_once __DIR__.'/../../helpers/database.php';
require_once __DIR__.'/../../models/Manga.php';
require_once __DIR__.'/../../models/Author.php';



try{
    $search = '';
    //$x = Manga::count();
    $pages = intval(filter_input(INPUT_GET,'pages',FILTER_SANITIZE_NUMBER_INT));
    $id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
    $mangas = Manga::readAll($search); // read with limits
    $authors = Author::readAll($search);

    if(!empty($_GET['pages'])){
    $mangas = Manga::readAll($pages); // read with limits and offset (pages)
    }
    if(!empty($_GET['id'])){
    //$appointments = Appointment::deleteAppointment();
    $mangas = Manga::delete($id); // delete with cascade  (votes and comments)
    }
}catch(PDOException $e){
    die('error'.$e->getMessage());
}

include __DIR__.'/../../views/dashboardViews/listMangas.php';

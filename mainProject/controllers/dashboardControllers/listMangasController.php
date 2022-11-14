<?php
require_once __DIR__.'/../../config/data.php';
require_once __DIR__.'/../../helpers/database.php';
require_once __DIR__.'/../../models/Manga.php';


try{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $searchError = '';
        $search = trim(filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($search)){
            $searchError = 'remplissez le champ pour faire une recherche';
        }else{
            $isOk = filter_var($search,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $searchError = 'aucun resultat trouver';
            }
        }

        if(empty($searchError)){
            $search = $_POST['search'];
            $mangaList = Manga::readAll($search);
            if($mangaList == ''){
                $searchError = 'aucun resultat trouver';
            }
        }
    }

    $search = '';
    //$x = Manga::count();
    $pages = intval(filter_input(INPUT_GET,'pages',FILTER_SANITIZE_NUMBER_INT));
    $id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
    $mangas = Manga::readAll($search); // read with limits
    var_dump($mangas);

    if(!empty($_GET['pages'])){
    $mangas = Manga::readAll($pages); // read with limits and offset (pages)
    }
   if(!empty($_GET['id'])){
    //$appointments = Appointment::deleteAppointment();
    $mangas = Manga::delete($id); // delete with cascade of votes and comments
}
}catch(PDOException $e){
    die('error'.$e->getMessage());
}

include __DIR__.'/../../views/dashboardViews/mangasList.php';

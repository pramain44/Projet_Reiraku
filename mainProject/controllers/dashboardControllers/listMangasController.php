<?php
require_once __DIR__.'/../../helpers/database.php';
require_once __DIR__.'/../../models/Manga.php';
require_once __DIR__.'/../../models/Author.php';
require_once(__DIR__.'/../../models/User.php');

User::check();

$title ='Mangas Liste';

try{

    $s = trim((string) filter_input(INPUT_GET, 's', FILTER_SANITIZE_SPECIAL_CHARS));

    // On définit le nombre d'éléments par page grâce à une constante déclarée dans config.php
    $limit = 10;

    // Compte le nombre d'éléments au total selon la recherche
    $nbMangas = Manga::count($s);

    // Calcule le nombre de pages à afficher dans la pagination
    $nbPages = ceil($nbMangas / $limit);

    // A recuperer depuis paramètre d'url. Si aucune valeur, alors vaut 1
    $currentPage = intval(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT));

    // Si la valeur de la page demandée n'est pas cohérente, on réinitialise à 0
    if ($currentPage <= 0 || $currentPage > $nbPages) {
        $currentPage = 1;
    }

    //Définit à partir de quel enregistrement positionner le curseur (l'offset) dans la requête
    $offset = $limit * ($currentPage - 1);

    // Appel à la méthode statique permettant de récupérer les Mangas selon la recherche et la pagination
    $mangas = Manga::getAll($s, $limit, $offset,);
} catch (\Throwable $th) {
    header('Location: /error.php');
    die;
}
include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/dashboardViews/listMangas.php';
include __DIR__.'/../../views/templates/dashboardFooter.php';
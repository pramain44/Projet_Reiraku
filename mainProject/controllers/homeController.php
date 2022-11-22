<?php
require_once __DIR__.'/../config/data.php';
require_once __DIR__.'/../helpers/database.php';
require_once __DIR__.'/../models/Categorie.php';
require_once __DIR__.'/../models/Manga.php';


$search = trim((string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));


$mangas = Manga::Select($search);


// appelle du front (html)
include(__DIR__.'/../views/home.php');
include(__DIR__.'/../views/templates/footer.php');

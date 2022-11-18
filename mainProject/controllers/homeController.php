<?php
require_once __DIR__.'/../config/data.php';
require_once __DIR__.'/../helpers/database.php';
require_once __DIR__.'/../models/Categorie.php';

$mangas = Categorie::readAll();


// appelle du front (html)
include(__DIR__.'/../views/home.php');
include(__DIR__.'/../views/templates/footer.php');

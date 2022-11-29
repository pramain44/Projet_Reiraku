<?php
require_once(__DIR__.'/../helpers/database.php');
require_once __DIR__.'/../models/Author.php';


$mangas = Author::AuthorsAndMangas();





include(__DIR__.'/../views/legal.php');

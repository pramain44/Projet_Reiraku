<?php
require_once(__DIR__.'/../../config/data.php');
require_once(__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../models/Manga.php');


$idPatient = intval(filter_input(INPUT_GET,'idPatient',FILTER_SANITIZE_NUMBER_INT));

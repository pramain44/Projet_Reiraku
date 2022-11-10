<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$comm = trim(filter_input(INPUT_POST, 'comm', FILTER_SANITIZE_SPECIAL_CHARS));
if(empty($comm)){
    $msg = 'écrivez quelques choses pour commenter';
}
}
// appelle du front (html)
include(__DIR__.'/../views/fiche.php');
include(__DIR__.'/../views/templates/footer.php');

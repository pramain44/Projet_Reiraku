<?php
session_start();


$idManga = $_SESSION['idManga'];
var_dump($_SESSION['idManga']);

header('location:ficheController.php?id='.$idManga.'.');
exit();




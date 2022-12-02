<?php
session_start();


$idManga = $_SESSION['idManga'];
var_dump($_SESSION['idManga']);

header('location:http://projet_2.0.localhost/mainProject/controllers/ficheController.php?id='.$idManga.'.');
exit();




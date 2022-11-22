<?php
session_start();

unset($_SESSION['user']);

header('Location: http://projet_2.0.localhost/mainProject/controllers/homeController.php');
die;

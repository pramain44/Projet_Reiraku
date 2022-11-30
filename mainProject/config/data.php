<?php
session_start();
require_once(__DIR__.'/../helpers/sessionFlash.php');

define('REGEX_WHATEVER', "^[0-9A-Za-zÀ-ÿ' +._-]+$");
define('REGEX_NO_NUMBER', "^[A-Za-zÀ-ÿ' ._-]+$");
define('REGEX_ROLE', "^[1]$");
define('MAX_SIZE', 5*1024*1024);
define('SUPPORTED_FORMATS', array('image/jpeg'));

define('UPLOAD_USER_PROFILE', 'C:/laragon/www/Projet_2.0/mainProject/public/upload/');



// constante de connexion a la Db
define('DSN', 'mysql:host=localhost;dbname=reiraku;charset=utf8');
define('LOGIN', 'root');
define('PASSWORD', '');
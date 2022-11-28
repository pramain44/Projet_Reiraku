<?php
session_start();
require_once(__DIR__.'/../helpers/sessionFlash.php');

define('REGEX_WHATEVER', "^[0-9A-Za-zÀ-ÿ' +._-]+$");
define('REGEX_NO_NUMBER', "^[A-Za-zÀ-ÿ' ._-]+$");
define('REGEX_ROLE', "^[1]$");

$maxFileSize = 2*1024*1024;

// constante de connexion a la Db
define('DSN', 'mysql:host=localhost;dbname=reiraku;charset=utf8');
define('LOGIN', 'root');
define('PASSWORD', '');
<?php
session_start();
require_once(__DIR__.'/../helpers/sessionFlash.php');

define('REGEX_WHATEVER', "^[0-9A-Za-zÀ-ÿ' +._-]+$");
define('REGEX_NO_NUMBER', "^[A-Za-zÀ-ÿ' ._-]+$");
define('REGEX_ROLE', "^[1]$");
define('REGEX_VOTE', "^[2-3]$");

// img const
define('SUPPORTED_FORMATS', array('image/jpeg'));
define('MAX_SIZE', 5*1024*1024);
define('UPLOAD_USER_PROFILE', __DIR__.'/../public/upload/');
define('UPLOAD_MANGAS_IMAGE', __DIR__.'/../public/assets/img');


//JWT
define ('SECRET_KEY', 'fsdh&éé"&"&éff444dsf54q6fs`dsffsdqhg:::!dsq');



// constante de connexion a la Db
define('DSN', 'mysql:host=localhost;dbname=reiraku;charset=utf8');
define('LOGIN', 'root');
define('PASSWORD', '');
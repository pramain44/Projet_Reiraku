<?php
require_once __DIR__.'/../config/data.php';

class Database{
    private static $pdo;

    public static function getInstance(){
        $pdo = new PDO(DSN, LOGIN, PASSWORD);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,FETCH_OBJ);
        return $pdo;
    }
}
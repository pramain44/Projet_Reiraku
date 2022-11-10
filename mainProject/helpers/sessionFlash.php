<?php

class SessionFlash{
    private string $msg;

    public static function set(string $msg){
        $_SESSION['msg'] = $msg;
    }

    public static function get():string{
        $message = $_SESSION['msg'];
        self::delete();
        return $message;
    }

    public static function delete():void{
        unset($_SESSION['msg']);
    }

    public static function exist():bool{
          return isset($_SESSION['msg']) ;
    }
}
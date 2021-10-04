<?php

namespace App\Heplpers;

class App_par
{
    public static $error_message;
    public static $succes_message;
    public static $_instance = null;


    private function __construct()
    {
    }

    public static function rn()
    {
        if (self::$_instance == null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function error_message($msg)
    {
        return [
            'code' => 1,
            'status' => 'success',
            'msg' => $msg,
        ];
    }

    public function success_message($msg)
    {
        return [
            'code' => 2,
            'status' => 'success',
            'msg' => $msg,
        ];
    }
}

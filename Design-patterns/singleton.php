<?php
// sigleton model
class Connect {
    private static $connect;

    private function __construct()
    {

    }
    private function __clone()
    {

    }
    public static function getConnect() : Connect{
        if (!(self::$connect instanceof self)){
            self::$connect = new self;
        }
        var_dump(self::$connect);
        
        return self::$connect;
    }
}
$a = Connect::getConnect();
$b = Connect::getConnect();

var_dump($a === $b);

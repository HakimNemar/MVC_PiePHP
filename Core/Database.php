<?php 

namespace Core;

class Database {
    private static $dbhost = "127.0.0.1";
    private static $dbuser = "root";
    private static $dbpass = "";

    static function OpenCon() {
        $conn = new \PDO('mysql:host=' . self::$dbhost . ';dbname=piephp;charset=utf8mb4', self::$dbuser, self::$dbpass);
        return $conn;
    }
}
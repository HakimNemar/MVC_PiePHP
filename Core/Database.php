<?php 

namespace Core;

class Database {
    private $dbhost = "127.0.0.1";
    private $dbuser = "root";
    private $dbpass = "";

    protected function OpenCon()
    {
        $conn = new \PDO('mysql:host='.$this->dbhost.';dbname=piephp;charset=utf8mb4', $this->dbuser, $this->dbpass);
        return $conn;
    }
}
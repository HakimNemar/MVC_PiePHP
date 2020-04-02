<?php

namespace Core;

class ORM extends Database
{
    private $conn;

    function __construct() {
        $this->conn = $this->OpenCon();
    }

    public function create($table, $fields) {
        $executeArray = [];
    
        $query = "INSERT INTO " . $table . "(";
        foreach ($fields as $key => $val) {
            $query .= $key . ", ";
        }
        $query = substr($query, 0, -2);
        $query .= ") VALUES (";
        foreach ($fields as $val) {
            $query .= "?, ";
            array_push($executeArray, $val);
        }
        $query = substr($query, 0, -2);
        $query .= ")";

        $sth = $this->conn->prepare($query);
        $sth->execute($executeArray);
        return $this->conn->lastInsertId();
    }
    
    public function update($table, $id, $fields) {
        $executeArray = [];

        $query = "UPDATE " . $table . " SET ";
        foreach ($fields as $key => $val) {
            $query .= $key . ' = ? , ';
            array_push($executeArray, $val);
        }
        $query = substr($query, 0, -2);
    
        $query .= "WHERE id = ?";
        array_push($executeArray, $id);

        $sth = $this->conn->prepare($query);
        $sth->execute($executeArray);
        return true;
    }

    public function find($table, $params = array(
            "WHERE" => "1",
            "ORDER BY" => "id ASC",
            
        )) {
        $executeArray = [];

        $query = "SELECT * FROM " . $table . " ";
        foreach ($params as $key => $val) {
            $query .= $key . " " . $val . " ";
            array_push($executeArray, $val);
        }
        $sth = $this->conn->prepare($query);
        $sth->execute();
        $res = $sth->fetchAll();
        return $res;
    }

    public function read($table, $id) {
        $sth = $this->conn->prepare("SELECT * FROM $table WHERE id = :id");
        $sth->execute([":id" => $id]);
        $res = $sth->fetch();
        return $res;
    }
    
    public function delete($table, $id) {
        $sth = $this->conn->prepare("DELETE FROM :table WHERE id = :id");
        $sth->execute([":table" => $table, ":id" => $id]);
        return true;
    }
}

// self::$nb == $this->nb pour une static
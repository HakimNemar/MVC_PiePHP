<?php

namespace Model;

use Core\Database;

class UserModel extends \Core\Entity
{
    private $email;
    private $password;
    private $conn;
    private $req;
    private static $relations = [
        "has many" => "article", // un article possède plusieurs commentaires
        "has one" => "comments"  // un commentaire possède un seul article
    ];

    public function __construct() {
        $this->conn = Database::OpenCon();
        $this->req = new \Core\Request();
        if (count($_POST) > 0) {
            $this->email = $this->req->getParam($_POST)["email"];
            $this->password = $this->req->getParam($_POST)["password"];
        }
    }

    function save() {
        $sth = $this->conn->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $sth->execute([":email" => $this->email, ":password" => $this->password]);
    }

    function login() {
        $sth = $this->conn->prepare("SELECT * FROM users WHERE email = :mail");
        $sth->execute([":mail" => $this->email]);
        $result = $sth->fetch();

        if (isset($result["email"]) && $result["email"] == $this->email && $result["password"] == $this->password) {
            return true;
        }
        else {
            return false;
        }
    }

    function getId($mail) {
        $sth = $this->conn->prepare("SELECT id FROM users WHERE email = :mail");
        $sth->execute([":mail" => $mail]);
        $result = $sth->fetch();
        return $result["id"];
    }

    function create($mail, $password) {
        $sth = $this->conn->prepare("INSERT INTO users (email, password) VALUES (:mail, :password)");
        $sth->execute([":mail" => $mail, ":password" => $password]);
    }

    function read($id) {
        // $id = $this->getId($mail);
        $sth = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $sth->execute([":id" => $id]);
        $res = $sth->fetch(\PDO::FETCH_ASSOC);

        if ($res == null) {
            return "Aucun user ";
        }
        else {   
            return $res;
        }
    }

    function update($mail, $email, $mdp) {
        $id = $this->getId($mail);
        $sth = $this->conn->prepare("UPDATE users SET email = :email, password = :mdp WHERE id = :id");
        $sth->execute([":email" => $email, ":mdp" => $mdp, ":id" => $id]);
    }

    function delete($id) {
        // $id = $this->getId($mail);
        $sth = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $sth->execute([":id" => $id]);
    }

    function read_all() {
        $sth = $this->conn->query("SELECT * FROM users");
        $res = $sth->fetchAll(\PDO::FETCH_ASSOC);
        
        return $res;
    }
}
<?php

namespace Model;

class UserModel extends \Core\Database
{
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    function save() {
        $sth = $this->OpenCon()->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $sth->execute([":email" => $this->email, ":password" => $this->password]);
    }

    function login() {
        $sth = $this->OpenCon()->prepare("SELECT * FROM users WHERE email = :mail");
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
        $sth = $this->OpenCon()->prepare("SELECT id FROM users WHERE email = :mail");
        $sth->execute([":mail" => $mail]);
        $result = $sth->fetch();
        return $result["id"];
    }

    function create($mail, $password) {
        $sth = $this->OpenCon()->prepare("INSERT INTO users (email, password) VALUES (:mail, :password)");
        $sth->execute([":mail" => $mail, ":password" => $password]);
    }

    function read($mail) {
        $id = $this->getId($mail);
        $sth = $this->OpenCon()->prepare("SELECT * FROM users WHERE id = :id");
        $sth->execute([":id" => $id]);
        $res = $sth->fetch();

        return $res;
    }

    function update($mail, $email, $mdp) {
        $id = $this->getId($mail);
        $sth = $this->OpenCon()->prepare("UPDATE users SET email = :email, password = :mdp WHERE id = :id");
        $sth->execute([":email" => $email, ":mdp" => $mdp, ":id" => $id]);
    }

    function delete($mail) {
        $id = $this->getId($mail);
        $sth = $this->OpenCon()->prepare("DELETE FROM users WHERE id = :id");
        $sth->execute([":id" => $id]);
    }

    function read_all() {
        $sth = $this->OpenCon()->query("SELECT * FROM users");
        $sth->fetch();
        $res = $sth->fetch();
        
        return $res;
    }
}
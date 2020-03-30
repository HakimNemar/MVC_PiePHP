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
}
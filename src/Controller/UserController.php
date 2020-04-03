<?php

namespace Controller;

use Core\ORM;
use Model\UserModel;

class UserController extends \Core\Controller
{
    protected $req;

    public function __construct() {
        $this->req = new \Core\Request();
    }

    public function indexAction() {
        echo "je suis dans UserController / indexAction";
        echo $this->render("index");
    }

    public function addAction() {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $user = new UserModel($this->req->getParam($_POST)["email"], $this->req->getParam($_POST)["password"]);
            $user->save();
            echo $this->render("login");
        }
        else {
            // $article = new ORM();
            // $res = $article->find('articles', ["LIMIT" => "2"]);
            // print_r($res);

            echo $this->render("register");
        }
    }

    public function loginAction() {
        if ($_POST == null) {
            echo $this->render("login");
        }
        else {
            if (isset($this->req->getParam($_POST)["emailCo"]) && isset($this->req->getParam($_POST)["passwordCo"])) {
                $log = new UserModel($this->req->getParam($_POST)["emailCo"], $this->req->getParam($_POST)["passwordCo"]);
                $log->login();
                
                if ($log->login() == true) {
                    echo $this->render("home");
                }
                else {
                    echo "no account";
                }
            }
        }
    }

    public function errorAction() {
        echo $this->render("404");
    }
}
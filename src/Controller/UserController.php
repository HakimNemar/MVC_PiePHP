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
        $instance = new \Model\UserModel();
        $user = $instance->read_all();
        echo $this->render("index", ["users" => $user]);
    }

    public function addAction() {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $user = new UserModel();
            $user->save();
            echo $this->render("login");
        }
        else {
            // $article = new ORM();
            // $res = $article->read('articles', 1);
            // print_r($res);

            echo $this->render("register");
        }
    }

    public function loginAction() {
        if ($_POST == null) {
            echo $this->render("login");
        }
        else {
            if (isset($this->req->getParam($_POST)["email"]) && isset($this->req->getParam($_POST)["password"])) {
                $log = new UserModel();
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

    public function deleteAction($id) {
        var_dump($id);
        echo $this->render("delete");
    }

    // public function registerAction() {
    //     // $params = $this->request->getQueryParams();

    //     $user = new UserModel($_POST);
    //     print_r($user);
    //     if (!$user->id) {
    //         $user->save();
    //         self::$_render = "Votre compte a ete cree." . PHP_EOL ;
    //     }

    //     echo $this->render("register");
    // }
}
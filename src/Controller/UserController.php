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
        $user = new UserModel();
        $user->delete($id);
        echo $this->render("delete");
    }

    public function showAction($id) {
        if ($id == "?") {
            $user = new UserModel();
            $res = $user->read_all();

            echo $this->render("show");
            print_r($res[0]);
            echo "<p>ID de l'utilisateur a afficher par defaut: " . $res[0]['id'] . "</p>";
        }
        else {
            $user = new UserModel();
            $res = $user->read($id);
            
            echo $this->render("show");
            print_r($res);

            if (is_array($res)) {
                echo "<p>ID de l'utilisateur a afficher : $id </p>";
            }
            else {
                echo "a l'ID : $id";
            }
        }
    }

    public function articleAction($id = null) {
        if ($id == null) {
            $article = new ORM();
            $res = $article->find('articles');
            
            echo $this->render("article", ["article" => $res]);
        }
        else {
            $article = new ORM();
            $res = $article->find('commentaires', [
                "WHERE" => "article_id = $id"
            ]);

            echo $this->render("comments", ["comments" => $res]);
        }
    }

    // public function registerAction() {
    //     $params = $this->req->getParam($_POST) ;
    //     $user = new UserModel($params);
    //     var_dump($user);

    //     if (!$user->id) {
    //         $user->save();
    //         self::$_render = " Votre compte a ete cree ." . PHP_EOL ;
    //     }
    // }
}
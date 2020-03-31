<?php

namespace Controller;

use Model\UserModel;

class UserController extends \Core\Controller
{
    public function indexAction() {
        echo "je suis dans UserController / indexAction";
        echo $this->render("index");
    }

    public function addAction() {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $user = new UserModel($_POST["email"], $_POST["password"]);
            $user->save();
            echo $this->render("login");
        }
        else {
            echo $this->render("register");
        }
    }
    
    // public function registerAction() {
    //     $test = new UserModel($_POST["email"], $_POST["password"]);
    //     $test->save();
    // }

    public function loginAction() {
        if ($_POST == null) {
            echo $this->render("login");
        }
        else {
            if (isset($_POST["emailCo"]) && isset($_POST["passwordCo"])) {
                $test = new UserModel($_POST["emailCo"], $_POST["passwordCo"]);
                $test->login();
                
                if ($test->login() == true) {
                    echo $this->render("home");
                }
                else {
                    echo "no account";
                }
            }
        }
    }

    public function homeAction() {
        echo $this->render("home");
    }
}
<?php

use Model\UserModel;

class UserController extends Controller
{
    public function indexAction() {
        echo "je suis dans UserController / indexAction";
        echo $this->render("index");
    }

    public function addAction() {
        echo $this->render("register");
        // print_r($_POST);
    }
    
    public function registerAction() {
        $test = new UserModel($_POST["email"], $_POST["password"]);
        $test->save();
    }
}
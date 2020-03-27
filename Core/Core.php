<?php

namespace Core;

use Router;

class Core
{
    public function run()
    {
        echo __CLASS__ . " [ OK ]" . PHP_EOL;

        $arr = explode("/" , $_SERVER["REDIRECT_URL"]);
        $class = ucfirst($arr[3] . "Controller");

        if (isset($arr[4])) {
            if ($arr[4] != "") {
                $methode = $arr[4] . "Action";
            }
            else {
                $methode = "indexAction";
            }
        }
        else {
            $methode = "indexAction";
        }

        // echo "$class -> $methode";

        $controller = new $class();    // $controller appel la class UserController
        $controller->$methode();       // pui $methode appel l'action au nom de la variable (indexAction) dans UserController
    }
}

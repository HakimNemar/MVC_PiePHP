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
        $methode = $arr[4] . "Action";

        echo "$class -> $methode";

        // $controller = new $class();    // $controller appel la class UserController
        // $controller->$methode();       // pui $methode appel l'action au nom de la variable (indexAction) dans UserController
        
    }
}

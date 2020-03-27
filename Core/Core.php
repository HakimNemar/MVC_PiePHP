<?php

namespace Core;

use Router;

class Core
{
    public function run()
    {
        echo __CLASS__ . " [ OK ]" . PHP_EOL;
        
        // if(($route = Router::get("/")) != null) {
        //     echo "url de base /";
        //     $controller = $route["controller"];
        // }
        // else {
            // DYNAMIQUE
            $arr = explode("/" , $_SERVER["REDIRECT_URL"]);
            $class = ucfirst($arr[3] . "Controller");
            
            if ($class == "UserController") {
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
                
                $controller = new $class();
                
                if (method_exists($controller, $methode)) {
                    $controller->$methode();
                }
                else {
                    echo "404";
                }
            }
            else {
                echo "404";
            }
        // }
    }
}

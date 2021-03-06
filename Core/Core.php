<?php

namespace Core;

use Controller\UserController;
use Router;

class Core
{
    public function __construct() {
        require_once("src/routes.php");
    }

    public function run() {
        echo __CLASS__ . " [ OK ]<br>";
        
        $myurl = explode("MVC_PiePHP", $_SERVER["REQUEST_URI"]);
        $name = "\Controller\\";
        
        $id = explode("/", $myurl[1]);
        $id = end($id);

        $urlparam = explode("/", $myurl[1]);
        $lastparam = str_replace(end($urlparam), "{id}", $urlparam);
        $implo = implode("/", $lastparam);

        if (($route = Router::get($myurl[1])) != null) {
            $class = ucfirst($route["controller"]) . "Controller";
            $action = $route["action"] . "Action";
            $con = $name . $class;
            $controller = new $con();
            $controller->$action();
        }
        elseif (($route = Router::get($implo)) != null) {
            $class = ucfirst($route["controller"]) . "Controller";
            $action = $route["action"] . "Action";
            $con = $name . $class;
            $controller = new $con();
            $controller->$action($id);
        }
        else {
            $arr = explode("/" , $_SERVER["REDIRECT_URL"]);
            $class = ucfirst($arr[3] . "Controller");
            
            if ($class == "UserController" || $class == "AppController") {
                if (isset($arr[4])) {
                    if ($arr[4] != "") {
                        $action = $arr[4] . "Action";
                    }
                    else {
                        $action = "indexAction";
                    }
                }
                else {
                    $action = "indexAction";
                }
                
                $con = $name . $class;
                $controller = new $con();
                
                if (method_exists($controller, $action) && $action != "showAction") {
                    $controller->$action();
                }
                else {
                    $action = "errorAction";
                    $controller->$action();
                }
            }
            else {
                $controller = new UserController();
                $controller->errorAction();
            }
        }
    }
}

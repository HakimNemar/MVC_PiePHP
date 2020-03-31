<?php

namespace Core;

function autoload($className)
{
    $fullPath = $className . ".php";

    $fullPath = str_replace("\\", "/", $fullPath);
    
    if (!file_exists($fullPath)) {
        if ($fullPath == "UserController.php" || $fullPath == "AppController.php"){
            $fullPath = "./src/Controller/" . $fullPath;
        }
        elseif ($fullPath == "Router.php" || $fullPath == "Controller.php") {
            $fullPath = "./Core/" . $fullPath;
        }
        else {
            $fullPath = "./src/" . $fullPath;
        }
    }
    include_once $fullPath;
}

spl_autoload_register("Core\autoload");
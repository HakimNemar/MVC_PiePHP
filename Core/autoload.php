<?php

function autoload($className)
{
    $fullPath = $className . ".php";

    $fullPath = str_replace("\\", "/", $fullPath);
    
    if (!file_exists($fullPath)) {
        if ($fullPath == "UserController.php"){
            $fullPath = "./src/Controller/" . $fullPath;
        }
        
        else {
            $fullPath = "./src/" . $fullPath;
        }
    }
    
    include_once $fullPath;
}

spl_autoload_register("autoload");
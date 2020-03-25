<?php

function autoload($classname)
{
    static $counter = 0;
    $path = ["./src/Model/", "./src/View", "./src/Controller/", "./Core/"];
    $extension = ".php";

    $fullPath = $path[$counter] . explode("\\", $classname)[count(explode("\\", $classname)) - 1] . $extension;

    if (!file_exists($fullPath)) 
    {
        if ($counter <= count($path)) 
        {
            $counter++;
            autoload($classname);
        }
        return false;
    }

    include_once $fullPath;
}

spl_autoload_register("autoload");
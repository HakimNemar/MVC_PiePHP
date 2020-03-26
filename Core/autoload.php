<?php

function autoload($className)
{
    $fullPath = $className . ".php";

    $fullPath = str_replace("\\", "/", $fullPath);

    if (!file_exists($fullPath)) {
        $fullPath = "./src/" . $fullPath;
    }

    include_once $fullPath;
}

spl_autoload_register("autoload");
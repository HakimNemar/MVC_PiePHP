<?php 

namespace Core;

class Entity 
{
    public function __construct($params) {

        if (array_key_exists("id", $params)) {
            ORM::read("articles", $params["id"]);
        }
        else {
            $orm = new ORM($params);
        }
    }
}
<?php 

namespace Core;

class Entity 
{
    public function __construct($params) {
        if (array_key_exists("id", $params)) {
            $res = ORM::read("articles", $params["id"]);
            foreach ($res as $key => $val) {
                $this->$key = $val;
            }
        }
        else {
            foreach ($params as $key => $val) {
                $this->$key = $val;
            }
        }
    }
}
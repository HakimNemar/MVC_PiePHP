<?php

namespace Core;

class Request
{
    public function getParam($REQ) {
        if ($REQ != null) {
            foreach ($REQ as $key => $value) {
                $arr[$key] = htmlspecialchars(stripslashes(trim($value)));
            }
            return $arr;
        }
    }
}
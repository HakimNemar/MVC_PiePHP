<?php

namespace Controller;

class AppController extends \Core\Controller
{
    public function __construct() {
        $this->req = new \Core\Request();
    }
    
    public function indexAction() {
        echo "je suis dans AppController / indexAction";
    }

    public function aboutusAction() {
        
    }
}
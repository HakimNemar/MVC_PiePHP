<?php

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/html/MVC_PiePHP/user/wesh', ['controller' => 'user', 'action' => 'add']);
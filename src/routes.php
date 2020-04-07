<?php

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/user/show/{id}', ['controller' => 'user', 'action' => 'show']);
Router::connect('/user/delete/{id}', ['controller' => 'user', 'action' => 'delete']);
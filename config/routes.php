<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;


Router::defaultRouteClass('Route');

Router::scope('/', function ($routes) {

    // Strona główna
    $routes->connect('/', ['controller' => 'Classes', 'action' => 'index']);

    // Strona logowania
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);

    // Strona wylogowania
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);

    $routes->fallbacks('InflectedRoute');
});

Plugin::routes();

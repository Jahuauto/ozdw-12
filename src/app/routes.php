<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection;

$routes->add('home', new Route('/home/{page}/{name}', array('page' => 1, 'name' => 'janek')));
$routes->add('list', new Route('/list/{page}', array('page' => 1)));

return $routes;

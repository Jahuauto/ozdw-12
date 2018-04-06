<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection;
$routes->add('home', new Route('/home/{page}/{nazwa}', array('page' => 1, 'nazwa' => 'janek')));
$routes->add('list', new Route('/list/{page}', array('page' => 1)));

return $routes;

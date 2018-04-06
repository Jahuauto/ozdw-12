<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/../src/app/routes.php'; 

$context = new Routing\RequestContext();
$context->fromRequest($request);

$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$respounce = new Response();
try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    
    ob_start();
    include sprintf (__DIR__ . '/../src/app/controllers/%s.php', $_route);
    $request = new Response(ob_get_clean());
} catch (Routing\Exception\RouteNotFoundException $e) {
    $respounce->setStatusCode(404);
    $respounce->setContent($e->getMessage());
} catch (Exception $e) {
    $respounce->setStatusCode(500);
    $respounce->setContent($e->getMessage());
}

$request->send();

/*
$path = $request->getPathInfo();


$response = new Response();


$dir = __DIR__ . '/../src/app/controllers/%s.php';

$map = array(
    '/home' => 'home',
    '/list' => 'list'
);

if (isset($map[$path])) {
    ob_start();
    require sprintf($dir,$map[$path]);
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Nie ma takiej strony');
}
$response->send();
*/
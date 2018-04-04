<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request  = Request::createFromGlobals();
$controller = $request->get('controller', 'home');
$response = new Response();


$dir = __DIR__ . '/../src/app/controllers/';

if (file_exists($dir . $controller . '.php')){
    ob_start();
    require $dir . $controller . '.php';
    $response->setContent(ob_get_clean());
}
else {
   $response->setStatusCode(404);
   $response->setContent('Nie ma takiej strony');
}
$response->send();
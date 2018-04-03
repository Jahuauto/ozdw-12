<?php
$controller = isset ($_GET['controller']) ? $_GET['controller'] : 'home';

$dir = __DIR__ . '/../src/app/controllers/';

echo $dir . $controller . '.php';

if (file_exists($dir . $controller . '.php')){
    require $dir . $controller . '.php';
}
else {
    header("HTTP/1.0 404 Not Found");
    echo "404";
}
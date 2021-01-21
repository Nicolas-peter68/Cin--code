<?php

require 'vendor/autoload.php';

use Config\Config;
/* liste des Controllers exemple que l'on utilise */
use App\Controllers\PageController;
use App\Controllers\MovieController;
/* fin dex Controller exemple */

//session_start();

$router = new AltoRouter();
$router->setBasePath(Config::getBasePath());

$router->map('GET', '/', function () {
    $controller = new PageController();
    $controller->index();
});

$router->map('GET', '/register', function () {
    $controller = new PageController();
    $controller->registerPage();
});

$router->map('POST', '/register/registerUser', function () {
    $controller = new PageController();
    $controller->registerUser();
});

$router->map('GET', '/login', function () {
    $controller = new PageController();
    $controller->loginPage();
});

$router->map('GET', '/movie/[i:id]', function ($id) {
    $controller = new PageController();
    $controller->moviePage($id);
});

$router->map('GET', '/actor/[i:id]', function ($id) {
    $controller = new PageController();
    $controller->actorPage($id);
});

$router->map('GET', '/news', function () {
    $controller = new PageController();
    $controller->newsPage();
});

$router->map('GET', '/director/[i:id]', function ($id) {
    $controller = new PageController();
    $controller->directorPage($id);
});





$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    //header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    $controller = new PageController();
    $controller->error404();
}
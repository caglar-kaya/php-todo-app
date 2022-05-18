<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../router/Router.php';
include '../router/routes.php';

$router = new Router();

$router->define($routes);

$uri = trim($_SERVER['REQUEST_URI'], '/');

$routeName = $uri;

$posOfQuestionMark = strpos($uri,'?');
if($posOfQuestionMark > 0){
    $routeName = substr($uri, 0, $posOfQuestionMark);
}

include $router->direct($routeName);

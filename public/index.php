<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../router/Router.php';
include '../router/routes.php';

$router = new Router();

$router->define($routes);

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

include $router->direct($uri);
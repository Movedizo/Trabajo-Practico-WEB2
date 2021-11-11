<?php

require_once 'libs/Router.php';
require_once 'Contoller/ApiController.php';

$router = new Router();

$router->addRoute('marcas', 'GET', 'ApiController', 'verMarcas');
$router->addRoute('marcas/:ID', 'GET', 'ApiController', 'verMarca');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
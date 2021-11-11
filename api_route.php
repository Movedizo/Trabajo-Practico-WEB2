<?php

require_once 'libs/Router.php';

$router = new Router();

$router->addRoute('reacondicionados', 'GET', 'ApiController', 'obtenerReacondicionados');
$router->addRoute('reacondicionado', 'POST', 'ApiController', 'crearReacondiconado');
$router->addRoute('reacondicionados/:ID', 'GET', 'ApiController', 'obtenerReacondicionados');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
<?php

require_once 'libs/Route.php';
require_once 'Controller/ApiCelularesController.php';
require_once 'Controller/ApiUserController.php';

$router = new Router();

$router->addRoute('marca', 'GET', 'ApiCelularesController', 'verMarcas');
$router->addRoute('reacondicionados', 'GET', 'ApiCelularesController', 'verReacondicionados');
$router->addRoute('reacondicionados', 'GET', 'ApiCelularesController', 'modelo');
$router->addRoute('reacondicionados', 'GET', 'ApiCelularesController', 'caracteristicas');
$router->addRoute('reacondicionados', 'GET', 'ApiCelularesController', 'almacenamiento');
$router->addRoute('reacondicionados', 'GET', 'ApiCelularesController', 'ram');
$router->addRoute('marcas/:ID', 'GET', 'ApiCelularesController', 'marcas');
$router->addRoute('reacondicionados/:ID', 'GET', 'ApiCelularesController', 'verReacondicionado');
$router->addRoute('reacondicionados/:ID', 'DELETE', 'ApiCelularesController', 'eliminar');
$router->addRoute('reacondicionados', 'POST', 'ApiCelularesController', 'createReacondicionado');
$router->addRoute('reacondicionados/:ID', 'PUT', 'ApiCelularesController', 'updateReacondicionado');

$router->addRoute('users/token', 'GET', 'ApiUserController', 'obtenerToken');
$router->addRoute('users/:ID', 'GET', 'ApiUserController', 'obtenerUsuario');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
<?php

require_once 'libs/Route.php';
require_once 'Controller/ApiCelularesController.php';
require_once 'Controller/ApiUserController.php';
require_once 'Controller/ApiComentController.php';


$router = new Router();

$router->addRoute('marca', 'GET', 'ApiCelularesController', 'verMarcas'); //anda
$router->addRoute('reacondicionados', 'GET', 'ApiCelularesController', 'verReacondicionados'); //anda 

$router->addRoute('comentarios' , 'GET', 'ApiComentController' ,'getComents');  //anda 
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentController' ,'getComents');// anda
$router->addRoute('comentarios/:ID ', 'POST', 'ApiComentController', 'createComent');

$router->addRoute('users/token', 'GET', 'ApiUserController', 'obtenerToken');
$router->addRoute('users/:ID', 'GET', 'ApiUserController', 'obtenerUsuario');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>
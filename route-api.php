<?php

require_once 'libs/Route.php';
require_once 'Controller/ApiCelularesController.php';
require_once 'Controller/ApiComentController.php';


$router = new Router();

$router->addRoute('comentarios/reacondicionado/:ID' , 'GET', 'ApiComentController' ,'getComentByReacondicionados');  //anda 
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentController' ,'getComents');// anda
$router->addRoute('comentarios', 'POST', 'ApiComentController', 'createComent');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>
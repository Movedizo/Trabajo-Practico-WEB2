<?php

require_once 'libs/Route.php';
require_once 'Controller/ApiComentController.php';


$router = new Router();

$router->addRoute('comentarios/reacondicionado/:ID' , 'GET', 'ApiComentController' ,'getComentByReacondicionados');  
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentController' ,'getComents');
$router->addRoute('comentarios', 'GET', 'ApiComentController' ,'getComents');
$router->addRoute('comentarios', 'POST', 'ApiComentController', 'createComent');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentController', 'deleteComent');



$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>
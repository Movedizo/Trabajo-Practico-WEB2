<?php

    require_once 'Controller/ReacondicionadosController.php';
    require_once 'Controller/LoginController.php';
    require_once 'Controller/MarcasController.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');   

    if (!empty($_GET['action'])){
        $action = $_GET['action'];
    } 
    else {
        $action = 'home';
    }

    $params = explode('/', $action);

    $marcasController = new MarcasController();
    $reacondicionadosController = new ReacondicionadosController();
    $ingresoController = new IngresoController();

    switch ($params[0]){

        case 'home': 
            $reacondicionadosController->verHome(); 
            break;
        case 'usuarios': 
            $ingresoController->verUsuarios(); 
            break;
        case 'usuario': 
            $reacondicionadosController->verUsuario(); 
            break;
        case 'registro':
            $ingresoController->vercreateUsser();
            break;
        case 'createUsser':
            $ingresoController->createUsser();
            break;
        case 'admin': 
            $ingresoController->ingresoAdmin();  
            break;
        case 'logout': 
            $ingresoController->logout(); 
            break; 
        case 'verificacion': 
            $ingresoController->verificacionIngreso(); 
            break;
        case 'verReacondicionados': 
            $reacondicionadosController->verReacondicionados(); 
            break; 
        case 'marca': 
            $marcasController->verMarcas();
            break;
        case 'modelo': 
            $reacondicionadosController->verModeloPorMarca($params[1]);
            break;
        case 'caracteristicas':
            $reacondicionadosController->verCaracteristicas($params[1]);
            break;
        case 'almacenamientoporgb':
             $reacondicionadosController->verPorAlmacenamiento($params[1]);
             break;       
        case 'almacenamiento': 
            $reacondicionadosController->verAlmacenamiento($params[1]);
            break;
        case 'memoriaram':
            $reacondicionadosController->verPorRam($params[1]);
            break;
        case 'ram': 
            $reacondicionadosController->verRam();
            break;
        case 'listaAdmin';
            $reacondicionadosController->verAdmin();
            break;
        case 'agregar':
            $reacondicionadosController->verAgregar();
            break;     
        case 'eliminar': 
            $reacondicionadosController->deleteReacondicionado($params[1]); 
            break;
        case 'updateReacondicionado': 
            $reacondicionadosController->updateReacondicionado($params[1]); 
            break;
        case 'editar':
            $reacondicionadosController->verEditar($params[1]);
            break;
        case 'createReacondicionado':
            $reacondicionadosController->createReacondicionado();
            break;
        case 'updateUsuario':
            $ingresoController->updateUsuario($params[1]);
            break;
        case 'editarRol':
            $ingresoController->vereditarRol($params[1]);
            break;
        default: 
            echo('404 Pagina no encontrada'); 
            break;
    }

?>
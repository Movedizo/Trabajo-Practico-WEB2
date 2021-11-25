<?php

    require_once 'Controller/ReacondicionadosController.php';
    require_once 'Controller/LoginController.php';
    require_once 'Controller/MarcasController.php';
    require_once 'Controller/UsserController.php';

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
    $loginController = new LoginController();
    $usserController = new UsserController();

    switch ($params[0]){

        case 'home': 
            $loginController->showIngreso();
            break;
        case 'homestart': 
            $loginController->showStart();
            break;
        case 'visitante':
            $loginController->showStart();
            break;
        case 'logout': 
            $loginController->logout(); 
            break;
        case 'verificacion': 
            $loginController->verificacionIngreso(); 
            break;
        case 'usuarios': 
            $usserController->verUsuarios(); 
            break;
        case 'registro':
            $usserController->vercreateUsser();
            break;
        case 'createUsser':
            $usserController->createUsser();
            break;
        case 'deleteUsuario':
            $usserController->deleteUsuario($params[1]);
            break;    
        case 'editarRol':
            $usserController->vereditarRol($params[1]);
            break;
        case 'updateUsuario':
            $usserController->updateUsuario($params[1]);
            break;
        case 'usuario': 
            $reacondicionadosController->verUsuario(); 
            break;
        case 'verReacondicionados': 
            $reacondicionadosController->getReacondicionadosPaginados(); 
            break; 
        /*
        Este caso es reemplazado por el verfull que utiliza las variables $_GET
        case 'modelo': 
            $reacondicionadosController->verModeloPorMarca($params[1]);
            break;*/
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
        case 'filtrado':
            $reacondicionadosController->filtrado();   
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
        case 'agregar':
            $reacondicionadosController->verAgregar();
            break;
        case 'verfull':
            $reacondicionadosController->verReacondicionadosFull($params[1]);
            break;
        case 'marca': 
            $marcasController->verMarcas();
            break;
        case 'eliminarMarca': 
            $marcasController->deleteMarca($params[1]);
            break;
        case 'editarMarca':
            $marcasController->verEditarMarca($params[1]);
            break;
        case 'createMarca':
            $marcasController->createMarca();
            break;
        case 'agregarMarca':
            $marcasController->verAgregarMarca();
            break;
        case 'updateMarca':
            $marcasController->updateMarca($params[1]);
            break;
        case 'verfull':
            $marcasController->verMarcasFull($params[1]);
            break;
        default: 
            echo('404 Pagina no encontrada'); 
            break;
    }

?>
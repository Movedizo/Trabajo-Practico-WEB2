<?php

require_once "./Model/ReacondicionadoModel.php";
require_once "./View/ReacondicionadoView.php";
require_once "./Model/MarcasModel.php";
require_once "./View/MarcasView.php";
require_once "./Helpers/AccesoHelper.php";
require_once "./Helpers/HelperPaginado.php";

const itemsPorPagina = 10;

class ReacondicionadosController
{

    private $model;
    private $view;
    private $accesoHelper;
    private $helperPaginado;

    function __construct()
    {
        $this->model = new ReacondicionadoModel();
        $this->view = new ReacondicionadoView();
        $this->marcasModel = new MarcasModel();
        $this->marcasView = new MarcasView();
        $this->accesoHelper = new AccesoHelper();
        $this->helperPaginado = new HelperPaginado();
    }

    function verUsuario()
    {
        session_start();
        session_destroy();
        $this->view->verUsuario();
    }

    function verReacondicionadosFull($id = NULL)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if (isset($_GET['marca'])) {
            $pormarca = ($_GET['marca']);
            $modeloPorMarca = $this->model->getModelosPorMarca($pormarca);
            $this->view->verModeloPorMarca($modeloPorMarca, $logueado);
        }



        /* Comentamos estas funciones para preguntar por prety URL

        if(isset($_GET['almacenamientoporgb'])){
            $porAlmacenamiento = $_GET['almacenamiento'];
            $porAlmacenamiento= $this->model->getModelosPorAlmacenamiento($porAlmacenamiento);
            $this->view->verPorAlmacenamiento($porAlmacenamiento, $logueado);
        }
        if(isset($_GET['ram'])){
            $porRam = $_GET['ram'];
            $porRam = $this->model->getRam();
            $this->view->verRam($porRam);
            };
    */
    }

    /* function verModeloPorMarca($id){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $marcas = $this->marcasModel->getMarcas($id);
        $modeloPorMarca = $this->model->getModelosPorMarca($id);
        $this->view->verModeloPorMarca($marcas, $modeloPorMarca, $logueado);
    }  */

    function verAlmacenamiento($almacenamiento)
    {
        $almacenamiento = $this->model->getAlmacenamiento();
        $this->view->verAlmacenamiento($almacenamiento);
    }

    function verPorAlmacenamiento($porAlmacenamiento)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        $porAlmacenamiento = $this->model->getModelosPorAlmacenamiento($porAlmacenamiento);
        $cantReacondicionados = count($porAlmacenamiento);

        $this->view->verPorAlmacenamiento($porAlmacenamiento, $logueado, $cantReacondicionados,);
    }

    function verRam()
    {
        $porRam = $this->model->getRam();
        $this->view->verRam($porRam);
    }

    function verPorRam($porRam)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        $porRam = $this->model->getModelosPorRam($porRam);
        $cantReacondicionados = count($porRam);

        $this->view->verPorRam($porRam, $logueado, $cantReacondicionados);
    }


    function verEditar($reacondicionado){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $this->view->verEdicion($reacondicionado, $logueado);
    }

    function verAgregar()
    {
        $this->view->verAgregar();
    }

    function verCaracteristicas($id)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        $reacondicionado = $this->model->getReacondicionado($id);
        $cantReacondicionados = count($reacondicionado);
        $this->view->verCaracteristicas($reacondicionado, $logueado, $cantReacondicionados);
    }

    function createReacondicionado()
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if (isset(
            $_POST['marca'],
            $_POST['modelo'],
            $_POST['precio'],
            $_POST['almacenamiento'],
            $_POST['pantalla'],
            $_POST['ram'],
            $_POST['bateria'],
            $_POST['stock']
        )) {

            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $precio = $_POST['precio'];
            $codigo = $_POST['codigo'];
            $almacenamiento = $_POST['almacenamiento'];
            $pantalla = $_POST['pantalla'];
            $ram = $_POST['ram'];
            $bateria = $_POST['bateria'];
            $stock = $_POST['stock'];

            if ($logueado['rol'] >= 1) {
                $this->model->createReacondicionado(
                    $marca,
                    $modelo,
                    $precio,
                    $codigo,
                    $almacenamiento,
                    $pantalla,
                    $ram,
                    $bateria,
                    $stock
                );
                $this->view->showHomeLocation("verReacondicionados");
            } else {
                $this->view->showError("Faltan datos");
                $this->view->verAgregar(); // o una o la otra
            }
        }
    }

    function updateReacondicionado(){
            $logueado = $this->accesoHelper->checkLoggedIn();
            if ($logueado['rol'] == 2){
                if (isset(
                    $_POST['marca'],
                    $_POST['modelo'],
                    $_POST['precio'],
                    $_POST['almacenamiento'],
                    $_POST['pantalla'],
                    $_POST['ram'],
                    $_POST['bateria'],
                    $_POST['stock']
                )) {
                $this->model->updateReacondicionadoFromDB($_POST['id_reacondicionado'], $_POST['marca'],$_POST['modelo'],$_POST['precio'],$_POST['codigo'], $_POST['almacenamiento'], $_POST['pantalla'], $_POST['ram'], $_POST['bateria'], $_POST['stock']);
                $this->view->showHomeLocation("verReacondicionados");
            } 
        }
        else { $this->view->showHomeLocation("homestart");
        } 
    }   
    
    function deleteReacondicionado($id)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if ($logueado['rol'] == 2) {
            $this->model->deleteReacondicionadoFromDB($id);
            $this->view->showHomeLocation("verReacondicionados");
        } else {
            $this->view->showHomeLocation("homestart");
        }
    }

    function filtrado(){
        $logueado = $this->accesoHelper->checkLoggedIn();

        if (isset($_POST['modelo'])) {
            $modelo = $_POST['modelo'];
        } else {
            $this->view->showError("Debe Ingresar el nombre del equipo a buscar");
        }
        $modelos = $this->model->getByModel($modelo);
        if ($modelos) {
            $this->view->verFiltro($modelos, $logueado);
        } else {
            $this->view->showError("Debe Ingresar el nombre del equipo a buscar");
        }
    }
    function getReacondicionadosPaginados(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $limit = itemPorPagina;
        $offset = $this->helperPaginado->getOffset();
        $totalPaginas = $this->helperPaginado->getPaginas();
        if (isset($_GET['pagina']))
            $pagina = $_GET['pagina'];
        else{
            $pagina = 1;
        }
        $reacondicionados = $this->model->getReacondicionadosPaginados($limit, $offset);
        $cantReacondicionados = $this->model->getReacondicionadoMultitabla();
        $cantReacondicionados = count($cantReacondicionados);
        $this->view->verPaginado($reacondicionados, $logueado, $totalPaginas, $pagina, $cantReacondicionados);
    }
}

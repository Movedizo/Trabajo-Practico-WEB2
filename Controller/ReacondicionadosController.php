<?php

require_once "./Model/ReacondicionadoModel.php";
require_once "./View/ReacondicionadoView.php";
require_once "./Helpers/AccesoHelper.php";

class ReacondicionadosController{

    private $model;
    private $view;
    private $accesoHelper;

    function __construct(){
        $this->model = new ReacondicionadoModel();
        $this->view = new ReacondicionadoView();
        $this->marcasModel = new MarcasModel();
        $this->marcasView = new MarcasView();
        $this->accesoHelper = new AccesoHelper();
    }

    function verHome(){
       $this->view->verAcceso();
    }

    function verUsuario(){
        session_start();
        session_destroy();
        $this->view->verUsuario();
    }

    function verModeloPorMarca($id){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $marcas = $this->marcasModel->getMarcas($id);
        $modeloPorMarca = $this->model->getModelosPorMarca($id);
        $this->view->verModeloPorMarca($marcas, $modeloPorMarca, $logueado);
    }  

    function verAlmacenamiento($almacenamiento){
        $almacenamiento= $this->model->getAlmacenamiento($almacenamiento);
        $this->view->verAlmacenamiento($almacenamiento);
    }

    function verPorAlmacenamiento($porAlmacenamiento){ 
        $logueado = $this->accesoHelper->checkLoggedIn();
        $porAlmacenamiento= $this->model->getModelosPorAlmacenamiento($porAlmacenamiento);
        $this->view->verPorAlmacenamiento($porAlmacenamiento, $logueado);
    }

    function verRam(){
        $porRam = $this->model->getRam();
        $this->view->verRam($porRam);
    }

    function verPorRam($porRam){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $porRam = $this->model->getModelosPorRam($porRam);
        $this->view->verPorRam($porRam, $logueado);
    }

    function deleteReacondicionado($id){
        $this->model->deleteReacondicionadoFromDB($id);
        $this->view->showHomeLocation("verReacondicionados");
    }

    function updateReacondicionado(){
        $this->model->updateReacondicionadoFromDB($_POST['id_reacondicionado'], $_POST['marca'],$_POST['modelo'],$_POST['precio'],$_POST['codigo'], $_POST['almacenamiento'], $_POST['pantalla'], $_POST['ram'], $_POST['bateria'], $_POST['stock']);
        $this->view->showHomeLocation("verReacondicionados");
    } 

    function verReacondicionados(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $reacondicionado = $this->model->getReacondicionadoMultitabla();
        $this->view->verReacondicionados($reacondicionado, $logueado);
    }

    function verEditar($reacondicionado){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $this->view->verEdicion($reacondicionado, $logueado);
    }

    function verAgregar(){
        $this->view->verAgregar();
    }

    function createReacondicionado(){
        $this->model->createReacondicionado($_POST['marca'],$_POST['modelo'],$_POST['precio'],$_POST['codigo'], $_POST['almacenamiento'], $_POST['pantalla'], $_POST['ram'], $_POST['bateria'], $_POST['stock']);
        $this->view->showHomeLocation("verReacondicionados");
    }

    function verCaracteristicas($id){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $reacondicionado = $this->model->getReacondicionado($id);
        $this->view->verCaracteristicas($reacondicionado, $logueado);     
    }

    function verAdmin(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $this->view->verAdmin($logueado);
    }
}


    

    

        

    






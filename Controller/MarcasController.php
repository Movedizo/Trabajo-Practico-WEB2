<?php

require_once "./Model/MarcasModel.php";
require_once "./View/MarcasView.php";
require_once "./Model/ReacondicionadoModel.php";
require_once "./Helpers/AccesoHelper.php";


class MarcasController{

    private $model;
    private $view;
    private $reacondicionadoModel;
    private $reacondicionadoView;
    private $accesoHelper;

    function __construct()

    {
        $this->accesoHelper= new AccesoHelper();
        $this->model = new MarcasModel();
        $this->reacondicionadoModel = new ReacondicionadoModel();
        $this->view = new MarcasView();
    }

    function verMarcas()
    {
        $logueado = $this->accesoHelper->checkLoggedIn();       
        $marcas = $this->model->getMarcas();
        $this->view->verMarcas($marcas, $logueado);
    } 

    function verEditarMarca($marca)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        $this->view->verEditarMarca($marca, $logueado);
    }

    function deleteMarca($id)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if (($logueado['rol'] == 2)){
            $reacondicionados = $this->reacondicionadoModel->getModelosPorMarca($id);
            if (!$reacondicionados){
                $this->model->deleteMarcaFromDB($id);
                $this->view->showHomeLocation("verMarcas");
            } 
            else {
                $this->view->alertaDeleteReacondicionados("Esta marca tiene reacondicionados");
            }
        }
    }

    function verMarcasFull($id = NULL)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if (isset($_GET['marca'])) {
            $pormarca = ($_GET['marca']);
            $modeloPorMarca = $this->reacondicionadosModel->getModelosPorMarca($pormarca);
            $this->reacondicionadosView->verModeloPorMarca($modeloPorMarca, $logueado);
        }
    }

    function updateMarca()
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if ($logueado['rol'] == 2){
            if((isset($_POST['marca']) && ($_POST['sistemaoperativo']))){
                 $this->model->updateMarca($_POST['id_marca'], $_POST['marca'],$_POST['sistemaoperativo']);
                 $this->view->showHomeLocation("marca");
            } 
            else { $this->view->showHomeLocation("homestart");
        } 
       }
    }

    function createMarca()
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if (($logueado['rol'] >= 1) && empty($_POST['id_marca']) && empty($_POST['marca']) && empty($_POST['sistemaoperativo'])){
            $this->model->createMarca($_POST ['id_marca'], $_POST['marca'], $_POST['sistemaoperativo']);
            $this->view->showHomeLocation("verMarcas");        
        }
        else {
          $this->view->alertaDeleteReacondicionados("No se pudo crear la marca");
        }  
    }   
}

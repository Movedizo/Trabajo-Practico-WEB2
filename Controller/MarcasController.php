<?php

require_once "./Model/MarcasModel.php";
require_once "./View/MarcasView.php";
require_once "./Model/ReacondiconadosModel.php";
require_once "./View/ReacondicionadosView.php";
require_once "./Helpers/AccesoHelper.php";


class MarcasController{

    private $model;
    private $view;
    private $reacondicionadosModel;
    private $reacondicionadosView;
    private $accesoHelper;

    function __construct()

    {
        $this->accesoHelper= new AccesoHelper();
        $this->model = new MarcasModel();
        $this->view = new MarcasView();
        $this->reacondicionadosModel = new ReacondicionadoModel();
        $this->reacondicionadosView = new ReacondicionadoView();
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
        $reacondicionados = $this->reacondicionadosModel->getModelosPorMarca($id);
        if (($logueado['rol'] == 2) && !empty($reacondicionados)){
            $this->model->deleteMarcaFromDB($id);
            $this->view->showHomeLocation("verMarcas");
        } 
        else {
            $marca = $this->model->getMarca($id);
            $this->view->alertaDeleteReacondicionados($reacondicionados, $marca, $id);
            $this->view->showHomeLocation("homestart");
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
        $this->model->getMarcas();
        if (($logueado['rol'] == 2) && !empty($_POST['marca']) && !empty($_POST['sistemaoperativo'])){
            $this->model->updateMarca($_POST['id_marca'], $_POST['marca'],$_POST['sistemaoperativo']);
            $this->view->showHomeLocation("marca");
        } 
        else { $this->view->showHomeLocation("homestart");
        } 
    }

    //function createMarca(){
        //$logueado = $this->accesoHelper->checkLoggedIn();
        //if (($logueado['rol'] >= 1)
           // && !empty( $_POST['marca']) && 
            //!empty ($_POST['sistemaoperativo'])){
            //$this->model->createMarca($_POST['marca'],$_POST['sistemaoperativo']);
            //$this->view->showHomeLocation("verMarcas");        
       // }
        //else {
        //    $this->view->verError("Faltan datos");
        //}  
    //}   
}

?>
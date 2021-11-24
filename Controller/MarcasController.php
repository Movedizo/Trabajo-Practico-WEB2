<?php

require_once "./Model/MarcasModel.php";
require_once "./View/MarcasView.php";
require_once "./Helpers/AccesoHelper.php";


class MarcasController{

    private $model;
    private $view;
    private $accesoHelper;

    function __construct(){
        $this->accesoHelper= new AccesoHelper();
        $this->model = new MarcasModel();
        $this->view = new MarcasView();
    }

    function verMarcas(){
        $logueado = $this->accesoHelper->checkLoggedIn();       
        $marcas = $this->model->getMarcas();
        $this->view->verMarcas($marcas, $logueado);
    } 


    function verEditar($marca){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $this->view->verEditar($marca, $logueado);
    }

    function deleteMarcaFromDB($id){
        $logueado = $this->accesoHelper->checkLoggedIn();
        if ($logueado['rol'] == 2) {
            $this->model->deleteMarcaFromDB($id);
            $this->view->showHomeLocation("verMarcas");
        } else {
            $this->view->showHomeLocation("homestart");
        }
    }

    function updateMarca(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        if ($logueado['rol'] == 2){
            if((isset($_POST['marca']) && ($_POST['sistemaoperativo']))){
        $this->model->updateMarca($_POST['id_marca'], $_POST['marca'],$_POST['sistemaoperativo']);
        var_dump($id_marca);
           //$this->view->showHomeLocation("marca");
        } 
        else { $this->view->showHomeLocation("homestart");
        } 
   }

    function createMarca()
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if (isset(
            $_POST['marca'],
            $_POST['sistemaoperativo'],
        )) {
            $marca = $_POST['marca'];
            $sistemaoperativo = $_POST['sistemaoperativo'];
            $pathImg = $this->insertImg();

            if ($logueado['rol'] >= 1) {
                $this->model->createMarca(
                    $marca,
                    $sistemaoperativo,
                    $pathImg
                );
                $this->view->showHomeLocation("verMarcas");
            } else {
                $this->view->verError("Faltan datos");
            }
        }
    }   
}

?>
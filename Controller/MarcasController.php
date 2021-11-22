<?php

require_once "./Model/MarcasModel.php";
require_once "./View/MarcasView.php";
require_once "./Helpers/AccesoHelper.php";

class MarcasController{

    private $model;
    private $view;
    private $accesoHelper;

    function __construct(){
        $this->model = new MarcasModel();
        $this->view = new MarcasView();
        $this->accesoHelper = new AccesoHelper();
    }

    function verMarcas(){
        $marcas = $this->model->getMarcas();
        $this->view->verMarcas($marcas);
    } 

    function deleteImgen($path){
        $this->authHelper->checkAdmin();
        $this->model->deleteImagen($path);
        unlink($path);
        $this->view->showHomeLocation();
    }

    function subirImagen(){
        $this->authHelper->checkAdmin();
        if(isset($_POST['marca'])){
            foreach($_FILES["imagesToUpload"]["tmp_name"] as $key => $tmp_name)
            {
                if(($_FILES['imagesToUpload']['type'][$key] != "image/jpg" && $_FILES['imagesToUpload']['type'][$key] != "image/jpeg" && $_FILES['imagesToUpload']['type'][$key] != "image/png")){
                    $error=true;   
                }
            }

            if (!$error){
                foreach($_FILES["imagesToUpload"]["tmp_name"] as $key => $tmp_name)
                {   
                    $filePath = "imagenesMarca/" . uniqid("", true) . "." 
                    . strtolower(pathinfo($_FILES['imagesToUpload']['name'][$key], PATHINFO_EXTENSION));
                    $this->imagenesModel->addImagen($_POST['marca'],$filePath);
                }
                $this->view->showHomeLocation();
            }

            else{    
                $marcas = $this->model->getMarcas();
                $reacondicionados = $this->reacondicionadosModel->getReacondicionados();
                $imagenes=$this->imagenesModel->getImagenes();
                $this->view->showHomeLocation($imagenes, $marcas, $reacondicionados, false, true, true);
            }
        }
    }
}

?>
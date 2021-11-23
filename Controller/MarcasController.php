<?php

require_once "./Model/MarcasModel.php";
require_once "./View/MarcasView.php";

class MarcasController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new MarcasModel();
        $this->view = new MarcasView();
    }

    function verMarcas(){
        $marcas = $this->model->getMarcas();
        $this->view->verMarcas($marcas);
    } 

    function deleteMarca($id){
        $this->authHelper->checkLoggedIn();
        try {
            $this->model->deleteMarca($id);
            header("Location: " . BASE_URL . "marcas");
        } catch (\Throwable $th) {
            $this->view->verError("La Marca no fue eliminada correctamente.");
        }
    }

    function updateMarca(){

        $this->authHelper->checkLoggedIn();
        if (isset($_POST['marca']) && isset($_POST['sistemaoperativo']) && ($_POST['marca'] != '')
            && ($_POST['sistemaoperativo'] != '')){

            $marca = $_POST["marca"];
            $sistemaoperativo = $_POST["sistemaoperativo"];
            $id_marca = $_POST["id_marca"];
            if($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png") {
                $this->model->updateMarca($marca, $sistemaoperativo, $_FILES['img']['tmp_name'], $id_marca);
            }
            else
                $this->model->updateMarca($marca, $sistemaoperativo, null, $id_marca);
            header("Location: " . BASE_URL . "editar");
        }
        $this->view->verError("La marca ya existe");
    }

    function agregarMarca(){

        $this->authHelper->checkLoggedIn();
        if (isset($_POST['marca']) && isset($_POST['sistemaoperativo'])) {

            $marca = $_POST["marca"];
            $sistemaoperativo = $_POST["sistemaoperativo"];
            if($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png") {
                $this->model->agregarMarca($marca, $sistemaoperativo, $_FILES['img']['tmp_name']);
            }
            else
                $this->model->agregarMarca($marca, $sistemaoperativo, null);
            header("Location: " . BASE_URL . "agregar");
        }
        $this->view->verError("La marca ya existe");
    }
}

?>

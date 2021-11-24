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

    function deleteMarca($id){
        $this->accesoHelper->checkLoggedIn();
        try {
            $this->model->deleteMarca($id);
            header("Location: " . BASE_URL . "marcas");
        } catch (\Throwable $th) {
            $this->view->verError("La Marca no fue eliminada correctamente.");
        }
    }

    function updateMarca(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        if (isset($_POST['marca']) && isset($_POST['sistemaoperativo']) && ($_POST['marca'] != '')
            && ($_POST['sistemaoperativo'] != '') && ($_FILES['imagen']!= '')){

            $marca = $_POST["marca"];
            $sistemaoperativo = $_POST["sistemaoperativo"];
            $id_marca = $_POST["id_marca"];
            if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
                $this->model->updateMarca($id_marca ,$marca, $sistemaoperativo, $_FILES['imagen']['tmp_name']);
            }
            else
                $this->model->updateMarca($marca, $sistemaoperativo, null, $id_marca);
            header("Location: " . BASE_URL . "editarMarca/"+$id_marca);
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

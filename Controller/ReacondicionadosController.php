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
    
    function verCaracteristicas($id){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $reacondicionado = $this->model->getReacondicionado($id);
        $this->view->verCaracteristicas($reacondicionado, $logueado);     
    }
    
    function verAdmin(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $this->view->verAdmin($logueado);
    }
    
    function createReacondicionado(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $codigo = $_POST['codigo'];
        $almacenamiento = $_POST['almacenamiento'];
        $pantalla = $_POST['pantalla'];
        $ram = $_POST['ram'];
        $bateria = $_POST['bateria'];
        $stock = $_POST['stock'];

        if ($logueado == 1){
            if (!empty($marca) && !empty($modelo) && !empty($precio) && !empty($codigo) && !empty($almacenamiento) && !empty($pantalla) && !empty($ram) && !empty($bateria && !empty($stock)) {
                $agregar = true;
                if ($modelo == $_POST['modelo']) {
                    $reacondicionados = $this->model->getReacondicionados();
                    if (count($reacondicionados) > 0)
                    $agregar = false;
                }

                if ($agregar){
                    if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" 
                        || $_FILES['input_name']['type'] == "image/png" ) {
                        $this->model->save($marca, $modelo, $precio, $codigo, $almacenamiento, $pantalla, $ram, $bateria, $stock, $_FILES['input_name']['tmp_name']);
                    }
                    else {
                        $this->model->save($marca, $modelo, $precio, $codigo, $almacenamiento, $pantalla, $ram, $bateria, $stock);
                    }
                    header("Location: " . VER);
                }

                else
                $this->view->showHomeLocation("Ese modelo ya existe");
            } 

            else { 
            $this->view->showHomeLocation("Faltan datos");
        }  
    }
    
    function updateReacondicionado(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $codigo = $_POST['codigo'];
        $almacenamiento = $_POST['almacenamiento'];
        $pantalla = $_POST['pantalla'];
        $ram = $_POST['ram'];
        $bateria = $_POST['bateria'];
        $stock = $_POST['stock'];

        if ($logueado == 1){
            $this->model->updateReacondicionadoFromDB($marca, $modelo, $precio, $codigo, $almacenamiento, $pantalla, $ram, $bateria, $stock, $_FILES['input_name']['tmp_name']);
            $this->view->showHomeLocation("verReacondicionados");
        } 
        else { $this->view->showHomeLocation("admin");
        } 
   }

   function deleteReacondicionado($id){
        $logueado = $this->accesoHelper->checkLoggedIn();
        if ($logueado == 1){
            $this->model->deleteReacondicionadoFromDB($id);
            $this->view->showHomeLocation("verReacondicionados");
        }
        else { $this->view->showHomeLocation("admin");
        } 
    }
}




    

        

    






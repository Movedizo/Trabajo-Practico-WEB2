<?php

require_once "./Model/MarcasModel.php";
require_once "./View/ApiView.php";

class ApiController{

    private $model;
    private $view;
   

    function __construct(){
        $this->model = new MarcasModel();
        $this->view = new ApiView();
    }

    function verMarcas(){
        $marcas = $this->model->getMarcas();
        return $this->view->response($marcas, 200);
    } 

    function verMarca($params = []){
        $idMarca = $params[":ID"];
        $marca = $this->model->getMarca($idMarca);
        return $this->view->response($marca, 200);
    }
 
}
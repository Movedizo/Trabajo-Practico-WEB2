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
}

?>
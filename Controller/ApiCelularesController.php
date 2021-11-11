<?php

require_once "./Model/MarcasModel.php";
require_once "./Model/ReacondicionadoModel.php";
require_once "./View/ApiView.php";

class ApiCelularesController{

    private $model;
    private $view;

    function __construct(){

        $this->marcasModel = new MarcasModel();
        $this->model = new ReacondicionadoModel();
        $this->view = new ApiView();
    }

    function verMarcas(){
        $marcas = $this->marcasModel->getMarcas();
        return $this->view->response($marcas, 200);
    } 

    function verReacondicionados(){
        $reacondicionados = $this->model->getReacondicionadoMultitabla();
        return $this->view->response($reacondicionados, 200);
    } 

    function verReacondicionado($params = null){
        $idReacondicionado = $params[":ID"];
        $reacondicionado = $this->modelMarcas->getReacondicionado($idReacondicionado);
        if ($reacondicionado){
            return $this->view->response($reacondicionado, 200);
        }
        else{
            return $this->view->response("El celular con id=$idReacondicionado no existe", 404);
        }
    }

    function verMarca($params = null){
        $idMarca = $params[":ID"];
        $marca = $this->modelMarcas->getMarca($idMarca);
        if ($marca){
            return $this->view->response($marca, 200);
        }
        else{
            return $this->view->response("La marca con id=$idMarca no existe", 404);
        }
    }
 
    function eliminar($params = null) {
        $idReacondicionado = $params[":ID"];
        $reacondicionado = $this->model->getReacondicionado($idReacondicionado);

        if ($reacondicionado) {
            $this->model->deleteReacondicionadoFromDB($idReacondicionado);
            return $this->view->response("El celular con el id=$idReacondicionado fue borrada", 200);
        } else {
            return $this->view->response("El celular con el id=$idReacondicionado no existe", 404);
        }
    }

    function createReacondicionado($params = null) {
        $idReacondicionado = $params[":ID"];
        $body = $this->getBody();
        $id = $this->model->createReacondicionado($idReacondicionado, $body->marca, $body->modelo, $body->precio, $body->codigo, $body->almacenamiento, $body->pantalla, $body->ram, $body->bateria, $body->stock);
        if ($id != 0) {
            $this->view->response("El celular se insertó con el id=$id", 200);
        } else {
            $this->view->response("El celular no se pudo insertar", 500);
        }
    }

    function updateReacondicionado($params = null) {
        $idReacondicionado = $params[':ID'];
        $body = $this->getBody();
        $reacondicionado = $this->model->getReacondicionado($idReacondicionado);

        if ($reacondicionado) {
            $this->model->updateReacondicionadoFromDB($idReacondicionado, $body->marca, $body->modelo, $body->precio, $body->codigo, $body->almacenamiento, $body->pantalla, $body->ram, $body->bateria, $body->stock);
            $this->view->response("El celular se actualizó correctamente", 200);
        } else {
            return $this->view->response("El celular con el id=$idReacondicionado no existe", 404);
        }
    }

    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }

}
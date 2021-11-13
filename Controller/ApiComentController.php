<?php

require_once "./Model/ComentsModel.php";
require_once "./Model/ReacondicionadoModel.php";
require_once "./View/ApiView.php";

class ApiComentController{
    private $model;
    private $view;

    function __construct(){

        $this->model = new ComentsModel();
        $this->view = new ApiView();
    }


    function getComents($params = null){
        $idComent = $params[':ID'];
        if(!isset($idComent)){
            $coments = $this->model->GetComents();
           if($coments){
                return $this->view->response($coments, 200);
            } 
            else return $this->view->response("Sin Comentarios", 400);
        }
        else {
            $coment = $this->model->GetComent($idComent);
            if($coment){
                return $this->view->response($coment, 200);
            }
            else return $this->view->response("Sin Comentarios", 400);
        }
    }
}
<?php

require_once "./Model/ComentsModel.php";
require_once "./View/ApiView.php";
require_once "./Helpers/AccesoHelper.php";

class ApiComentController{

    private $model;
    private $view;
    private $accesoHelper;

    function __construct(){

        $this->accesoHelper = new AccesoHelper();
        $this->model = new ComentsModel();
        $this->view = new ApiView();

    }

    function getComents($params = null){

        $idComent = $params[':ID'];

        if(!isset($idComent)){
            $coments = $this->model->GetComents($idComent);
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

    function createComent(){

        $logueado = $this->accesoHelper->checkLoggedIn();
        if($logueado >= 1){
            $body = $this->getBody();
            $id = $this->model->createComent($body->comentario, $body->puntaje, $body->fecha, $body->id_reacondicionado, $body->id_usuario);
            if ($id != 0) {
                $this->view->response("El comentario se insertó con el id=$id", 200);
            } 
            else {
                $this->view->response("El comentario no se pudo insertar", 500);
            }
        }
    }

    function deleteComent($params = null){
        $logueado = $this->accesoHelper->checkLoggedIn();
        if($logueado >= 1){
            $idComent = $params[":ID"];
            $coment = $this->model->getComents($idComent);

            if ($coment) {
                $this->model->getComents($idComent);
                return $this->view->response("El comentario con el id=$idComent fue eliminado", 200);
            } else {
                return $this->view->response("El comentario con el id=$idComent no existe", 404);
            }
        }
    }

    private function getBody() {

        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}

?>



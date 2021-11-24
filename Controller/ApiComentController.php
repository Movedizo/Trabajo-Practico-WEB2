<?php

require_once "./Model/ComentsModel.php";
require_once "./Model/ReacondicionadoModel.php";
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
        if (!isset($idComent)) {
            $coments = $this->model->GetComents();
            if ($coments) {
                return $this->view->response($coments, 200);
            } else return $this->view->response("Sin Comentarios", 400);
        } else {
            $coment = $this->model->GetComent($idComent);
            if ($coment) {
                return $this->view->response($coment, 200);
            } else return $this->view->response("Sin Comentarios", 400);
        }
    }

    function getComentByReacondicionados($params = null){
        $idReacondicionado = $params[':ID'];
            $comentarios = $this->model->getComentByReacondicionados($idReacondicionado);
            if($comentarios){
                return $this->view->response($comentarios, 200);
            } else{
                return $this->view->response("Sin Comentarios", 400);
            }
        }
        
        function insertComment($params = []) 
        {
            $this->authHelper->checkloggedIn();
            $body = $this->getBody();   
            $id = $this->model->insertComment($body->content, $body->score, $body->id_author, $body->id_product);
            if ($id != 0) {
                $this->view->response("El comentario se insertó con el id=$id", 200);
            } else {
                $this->view->response("El comentario no se pudo insertar", 500);
            }
    
        }

    function createComent($params = null){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $body = $this->getBody();
        
        $id = $this->model->createComent($body->id_reacondicionado, $body->id_usuario, $body->comentario, $body->puntaje);
        if ($id != 0) {
            $this->view->response("El comentario se insertó con el id=".$id, 200);
        } else {
            $this->view->response("El comentario no se pudo insertar", 500);
        } 
        
    }

    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
    
}

?>

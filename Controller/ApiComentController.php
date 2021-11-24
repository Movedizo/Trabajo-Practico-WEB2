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
     

    function createComent(){
        $body = $this->getBody();
        $id = $this->model->insertarComent( $body->id_usuario, $body->id_reacondicionado, $body->comentario, $body->puntaje);
        if ($id != 0) {
            $this->view->response("El comentario se inserto con el id=".$id, 200);
        } else {
            $this->view->response("El comentario no se pudo insertar", 500);
        } 
        
    }

    function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
    
    function deleteComent($params = []){
        $logueado = $this->accesoHelper->checkLoggedIn();
        if($logueado['rol'] == 2)
        $idComent = $params[':ID'];
        $coment = $this->model->getComent($idComent);
        if($coment){
            $this->model->deleteComent($idComent);
            return $this->view->response("Se elimino el comentario con el id=".$idComent, 200);
        }else{
            return $this->view->response("El comentario ya no existe", 400);
        }
    }
}

?>

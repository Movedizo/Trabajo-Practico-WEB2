<?php

require_once "./Model/ComentsModel.php";
require_once "./Model/ReacondicionadoModel.php";
require_once "./View/ApiView.php";
require_once "./Helpers/AccesoHelper.php";


class ApiComentController
{
    private $model;
    private $view;
    private $accesoHelper;

    function __construct()
    {
        $this->accesoHelper = new AccesoHelper();
        $this->model = new ComentsModel();
        $this->view = new ApiView();
    }

    function getComents($params = null)
    {
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


    function createComent($params = null)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if ($logueado['rol'] >= 1) {
            $body = $this->getBody();
            var_dump($body);
            $this->model->createComent($body->id_reacondicionado, $body->id_usuario, $body->comentario, $body->puntaje, $body->fecha);
        }
    }
    private function getBody()
    {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}

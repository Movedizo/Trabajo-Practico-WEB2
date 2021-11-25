<?php

require_once "./Model/IngresoModel.php";
require_once "./View/IngresoView.php";
require_once "./Helpers/AccesoHelper.php";

class UsserController 
{
    private $accesoHelper;
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new IngresoModel();
        $this->view = new IngresoView();
        $this->accesoHelper = new AccesoHelper();
    }

    function vercreateUsser()
    {
        $this->view->showCreateUsser();
    }

    function verUsuarios()
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        $usuarios = $this->model->getUsser();
        $this->view->showUsuarios($usuarios, $logueado);
    }

    function createUsser()
    {
        if(!empty($_POST['usuario'])&& !empty($_POST['password'])){
            $userEmail=$_POST['usuario'];
            $userPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);        
            $this->model->createUsser($userEmail,$userPassword);  
            $this->view->showhome('homestart');
        }   
    }

    function verEditarRol($idUsuario)
    {
        $usuario= $this->model->getUsuario($idUsuario);
        $this->view->showEditarRol($idUsuario, $usuario);
    }

    function updateUsuario($idUsuario)
    {
        $idUsuario= $_POST['idUsuario'];
        $usuario= $this->model->getUsuario($idUsuario);
        $logueado = $this->accesoHelper->checkLoggedIn();
        if($logueado['rol']== 2){
        $rol = $_POST['rol'];
        if($usuario){
            $this->model->updateUsuarioDB($rol, $idUsuario);
            $this->view->showHome('usuarios');
            }
        }
    }

    function deleteUsuario($idUsuario)
    {
        $logueado = $this->accesoHelper->checkLoggedIn();
        if($logueado['rol']== 2){
        $this->model->deleteUsuario($idUsuario);
        $this->view->showHome('usuarios');
        }
    }
}

?>
<?php

require_once "./Model/IngresoModel.php";
require_once "./View/IngresoView.php";

class IngresoController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new IngresoModel();
        $this->view = new IngresoView();
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showHome("Sesion Terminada");
    }

    function ingresoAdmin(){
        $this->view->showIngreso();
    }

    function verificacionIngreso(){
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $user = $this->model->getAcceso($usuario);
            if ($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION["usuario"] = $usuario;
                $this->view->showAdmin();
            } 
            else {
                $this->view->showIngreso("Verificar datos ingresados");
            }
        }
    }

    function createUsser(){
        $this->view->showCreateUsser();
        if(!empty($_POST['usuario'])&& !empty($_POST['password'])){
            $userEmail=$_POST['usuario'];
            $userPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);        
            $usuarios = $this->model->getUsser();
            if($userEmail ==$usuarios){
                $this->view->ShowIngreso("El usuario ya existe");
            }
            else{
                $this->model->createUsser($userEmail,$userPassword);
            }
        }   
           
    }
}


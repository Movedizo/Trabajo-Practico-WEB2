<?php

require_once "./Model/IngresoModel.php";
require_once "./View/IngresoView.php";
require_once "./Helpers/AccesoHelper.php";



class IngresoController {

    private $accesoHelper;
    private $model;
    private $view;

    function __construct(){
        $this->model = new IngresoModel();
        $this->view = new IngresoView();
        $this->accesoHelper = new AccesoHelper();
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showHome("home");
    }

    function showingreso(){
        $this->view->showIngreso();
    }

    function showStart(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $this->view->showStart($logueado);
    }

    function verUsuarios(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        $usuarios = $this->model->getUsser();
        $this->view->showUsuarios($usuarios, $logueado);


    }

    function verificacionIngreso(){
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $user = $this->model->getAcceso($usuario);
        }
        if ($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION['rol']= $user->rol;
                $_SESSION['id_usuario']= $user->id;
        $logueado = $this->accesoHelper->checkLoggedIn();
        $this->view->showStart($logueado);
        } 
         else {
                $this->view->showIngreso("Verificar datos ingresados");
            }
        }
    function vercreateUsser(){
    $this->view->showCreateUsser();

    }
    function createUsser(){
        if(!empty($_POST['usuario'])&& !empty($_POST['password'])){
            $userEmail=$_POST['usuario'];
            $userPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);        
            $this->model->createUsser($userEmail,$userPassword);  
            $this->view->showhome('homestart');
        }   
           
    }
    function verEditarRol($idUsuario){
        $usuario= $this->model->getUsuario($idUsuario);
        $this->view->showEditarRol($idUsuario, $usuario);
    }

    function updateUsuario($idUsuario){
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

    function deleteUsuario($idUsuario){
        $logueado = $this->accesoHelper->checkLoggedIn();
        if($logueado['rol']== 2){
        $this->model->deleteUsuario($idUsuario);
        $this->view->showHome('usuarios');

        }
    }

}
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
        $this->view->showHome("Sesion Terminada");
    }

    function ingresoAdmin(){
        $this->view->showIngreso();
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
            if ($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION['rol']= $user->rol;
                $this->view->showAdmin();
            } 
            else {
                $this->view->showIngreso("Verificar datos ingresados");
            }
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
        }   
           
    }

    function editarRol($id){
        $logueado = $this->accesoHelper->checkLoggedIn();
        if ($logueado == 2){
            
            
        }
    }

    function updateUsuario(){
        $logueado = $this->accesoHelper->checkLoggedIn();
        if ($logueado == 2){
            if(isset($_POST['rol'])){
                $rol = $_POST['rol'];
                $this->model->updateUsuarioDB($_POST['id'], $_POST['usuario'],$_POST['rol'],);
                $this->view->showUsuarios($logueado, null);
        }
    }
        } 
   

    }
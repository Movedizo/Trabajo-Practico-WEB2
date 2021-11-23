<?php

require_once "./Model/IngresoModel.php";
require_once "./View/IngresoView.php";
require_once "./Helpers/AccesoHelper.php";

class LoginController {

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
}

?>
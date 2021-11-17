<?php
require_once ('./libs/smarty-3.1.39/smarty-3.1.39/libs/Smarty.class.php');

class IngresoView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showIngreso($error = ""){
        $this->smarty->assign('titulo', 'Ingreso');   
        $this->smarty->assign('error', $error);      
        $this->smarty->display('templates/ingreso.tpl');
    }
    
    function showAdmin(){
        $this->smarty->display('templates/admin.tpl');
    }

    function showHome(){
        header("Location: ".BASE_URL."home");
    }
    function showCreateUsser(){
        $this->smarty->display('templates/registro.tpl');

    }
    
    function showEditarRol($idUsuario,$usuario){
        $this->smarty->assign('id', $idUsuario);     
        $this->smarty->assign('usuario', $usuario); 
        var_dump($usuario);    
        $this->smarty->display('templates/editarusuario.tpl');
    }

    function showUsuarios($usuarios, $logueado){
        $this->smarty->assign('logueado', $logueado);     
        $this->smarty->assign('usuarios', $usuarios);     
        $this->smarty->display('templates/usuarios.tpl');
    }

}

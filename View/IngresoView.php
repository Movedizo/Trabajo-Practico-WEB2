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
    
    function showStart($logueado){
        $this->smarty->assign('rol', $logueado['rol']);     
        $this->smarty->display('templates/start.tpl');
    }

    function showUsuario(){
        $this->smarty->display('templates/usuario.tpl');
    }

    function showHome($url){
        header("Location: ".BASE_URL."$url");
    }

    function showCreateUsser(){
        $this->smarty->display('templates/registro.tpl');
    }
    
    function showEditarRol($idUsuario,$usuario){
        $this->smarty->assign('id', $idUsuario);     
        $this->smarty->assign('usuario', $usuario);    
        $this->smarty->display('templates/editarusuario.tpl');
    }

    function showUsuarios($usuarios, $logueado){
        $this->smarty->assign('rol', $logueado['rol']);     
        $this->smarty->assign('usuarios', $usuarios);     
        $this->smarty->display('templates/usuarios.tpl');
    }
}

?>

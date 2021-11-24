<?php

require_once './libs/smarty-3.1.39/smarty-3.1.39/libs/Smarty.class.php';

class ReacondicionadoView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function verAcceso(){
        $this->smarty->assign('titulo', 'Telefonos Reacondicionados Tandil');
        $this->smarty->display('templates/acceso.tpl');
    }

    function verUsuario(){
        $this->smarty->display('templates/usuario.tpl');
    }



    function verModeloPorMarca($modeloPorMarca, $cantReacondicionados){
        $this->smarty->assign('cantReacondicionados', $cantReacondicionados);
        $this->smarty->assign('titulo', "Lista de Celulares Por Marca");
        $this->smarty->assign('reacondicionados', $modeloPorMarca);
        $this->smarty->display('templates/modelos.tpl');
    }

    function showHomeLocation($url){
        header("Location: ".BASE_URL."$url");
    }

    function verPorAlmacenamiento($porAlmacenamiento, $logueado, $cantReacondicionados){
        $this->smarty->assign('rol', $logueado['rol']);
        $this->smarty->assign('cantReacondicionados', $cantReacondicionados);
        $this->smarty->assign('titulo', "Lista de Celulares Por Almacenamiento");
        $this->smarty->assign('reacondicionados', $porAlmacenamiento);
        $this->smarty->display('templates/reacondicionadosTable.tpl');   
        
    }

    function verAlmacenamiento($almacenamiento){
        $this->smarty->assign('titulo',  "Lista de Almacenamientos");
        $this->smarty->assign('almacenamiento', $almacenamiento);
        $this->smarty->display('templates/almacenamiento.tpl');
    }

    function verRam($ram){
        $this->smarty->assign('titulo',  "Lista de Ram");
        $this->smarty->assign('ram', $ram);
        $this->smarty->display('templates/ram.tpl');
    }

    function verPorRam($porRam, $logueado, $cantReacondicionados){
        $this->smarty->assign('rol', $logueado['rol']);
        $this->smarty->assign('titulo', "Lista de Celulares Por Velocidad de Procesamiento");
        $this->smarty->assign('reacondicionados', $porRam);
        $this->smarty->assign('cantReacondicionados', $cantReacondicionados);
        $this->smarty->display('templates/reacondicionadosTable.tpl');   
    }
    

    function verReacondicionados($reacondicionado){
        $this->smarty->assign('reacondicionados', $reacondicionado);
        $this->smarty->display('templates/reacondicionadosTable.tpl');
    }
 
    function verEdicion($reacondicionado){
        $this->smarty->assign('reacondicionados', $reacondicionado);
        $this->smarty->display('templates/editar.tpl');
    }

    function verAgregar(){
        $this->smarty->display('templates/agregar.tpl');
    }

    function verCaracteristicas($reacondicionado, $logueado, $cantReacondicionados){
        $this->smarty->assign('rol', $logueado['rol']);
        $this->smarty->assign('usuario', $logueado['id_usuario']);

        $this->smarty->assign('cantReacondicionados', $cantReacondicionados);
        $this->smarty->assign('titulo', "Detalles del Reacondicionado");
        $this->smarty->assign('reacondicionados', $reacondicionado);
        $this->smarty->display('templates/reacondicionadosTable.tpl');   
    }
    function showError($error){
        echo($error);
    

    }

    function verFiltro($modelo, $logueado){
        $this->smarty->assign('rol', $logueado['rol']);

        $this->smarty->assign('modelo', $modelo);
        $this->smarty->display('templates/filtro.tpl');   
    }

    function verPaginado($reacondicionados, $logueado, $totalPaginas, $pagina, $cantReacondicionados){
        $this->smarty->assign('totalPaginas', $totalPaginas);
        $this->smarty->assign('reacondicionados', $reacondicionados);
        $this->smarty->assign('cantReacondicionados', $cantReacondicionados);
        $this->smarty->assign('pagina', $pagina);
        $this->smarty->assign('rol', $logueado['rol']);
        $this->smarty->display('templates/reacondicionadosTable.tpl');   
    }


}
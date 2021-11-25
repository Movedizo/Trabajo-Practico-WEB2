<?php

require_once './libs/smarty-3.1.39/smarty-3.1.39/libs/Smarty.class.php';

class MarcasView{

    private $smarty;

    function __construct() 
    {
        $this->smarty = new Smarty();
    }

    function verMarcas($marcas, $logueado)
    {
        $this->smarty->assign('rol', $logueado['rol']);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/marcas.tpl');
    }

    function verEditarMarca($marca, $logueado)
    {
        $this->smarty->assign('rol', $logueado['rol']);
        $this->smarty->assign('marca', $marca);
        $this->smarty->display('templates/editarMarca.tpl');
    }

    function verAgregarMarca(){
        $this->smarty->display('templates/agregarMarca.tpl');
    }

    function verError($aviso)
    {
        $this->smarty->assign('aviso', $aviso);
        $this->smarty->display('templates/marcas.tpl');
    }

    function alertaDeleteReacondicionados($aviso)
    {
        echo ($aviso);
    }

    function showHomeLocation($url)
    {
        header("Location: ".BASE_URL."$url");
    }
}

?>
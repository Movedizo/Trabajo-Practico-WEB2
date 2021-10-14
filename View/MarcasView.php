<?php

require_once './libs/smarty-3.1.39/smarty-3.1.39/libs/Smarty.class.php';

class MarcasView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function verMarcas($marcas){
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/marcas.tpl');
    }
}
<?php

include_once 'Model/ReacondicionadoModel.php';

const itemPorPagina = 10;

class HelperPaginado 
{
    private $model;

    function __construct()
    {
        $this->model = new ReacondicionadoModel();
    }

   function getPaginas()
   {
        $limite = itemPorPagina; 
        $totalReacondicionados = $this->model->getTotalReacondiconados();
        $totalReacondicionados = ceil($totalReacondicionados / $limite);
        return $totalReacondicionados;
    }       

    function getOffset()
    {
        $pagina = 1;
        if(isset($_GET['pagina'])){
            $pagina = $_GET['pagina'];
        }
        $limit = itemPorPagina;
        $offset = ($pagina - 1) * $limit;
        return $offset;
    }
}

?>
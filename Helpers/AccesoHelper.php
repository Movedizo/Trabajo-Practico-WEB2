<?php

class AccesoHelper{

    function checkLoggedIn(){
    session_start();
    if(!isset($_SESSION["usuario"])){
        $logueado = 0;
        }
    else {$logueado = $_SESSION['rol'];
        }
    return $logueado;
    }
}

?>
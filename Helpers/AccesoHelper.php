<?php

class AccesoHelper
{

    function checkLoggedIn()
    {
        session_start();
        if (isset($_SESSION["usuario"])) {
            $logueado = $_SESSION;
        } else {
            $logueado = 0;
        }
    return $logueado;
    }
}

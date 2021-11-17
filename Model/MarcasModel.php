<?php

class MarcasModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=csv_db 6;charset=utf8', 'root', '');
    }

    function getMarcas(){
        $sentencia = $this->db->prepare( "SELECT * FROM marcas" );
        $sentencia->execute();
        $marcas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $marcas;
    }

    function getMarca($id){
        $sentencia = $this->db->prepare( "SELECT * FROM marcas WHERE id_marca = ?" );
        $sentencia->execute(array($id));
        $marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $marca;
    }

    function subirImagen($imagen){
        $target = 'img/marca/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $target);
        return $target;
    }
}
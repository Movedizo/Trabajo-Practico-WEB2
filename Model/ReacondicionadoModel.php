<?php

class ReacondicionadoModel{

    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=csv_db 6;charset=utf8', 'root', '');
    }

    function getModelosPorMarca($modelo){
        $sentencia = $this->db->prepare( "SELECT * FROM reacondicionados WHERE id_marca = ?" );
        $sentencia->execute(array($modelo));
        $modelo = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $modelo;
    }

    function getAlmacenamiento(){
        $sentencia = $this->db->prepare("SELECT r.almacenamiento FROM reacondicionados as r GROUP BY almacenamiento");
        $sentencia->execute();
        $almacenamiento= $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $almacenamiento;
    }

    function getModelosPorAlmacenamiento($porAlmacenamiento){
        $sentencia = $this->db->prepare( "SELECT * FROM reacondicionados as r INNER JOIN marcas as m ON r.id_marca=m.id_marca WHERE almacenamiento = ?" );
        $sentencia->execute(array($porAlmacenamiento));
        $porAlmacenamiento= $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $porAlmacenamiento;
    }

    function getRam(){
        $sentencia = $this->db->prepare("SELECT r.ram FROM reacondicionados as r GROUP BY ram");
        $sentencia->execute();
        $ram= $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $ram;
    }

    function getModelosPorRam($porRam){
        $sentencia = $this->db->prepare( "SELECT * FROM reacondicionados as r INNER JOIN marcas as m ON r.id_marca=m.id_marca  WHERE ram = ?" );
        $sentencia->execute(array($porRam));
        $porRam= $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $porRam;
    }

    function createReacondicionado($marca, $modelo, $precio, $codigo, $almacenamiento, $pantalla, $ram, $bateria, $stock){
        $sentencia = $this->db->prepare("INSERT INTO reacondicionados(id_marca, modelo, precio, codigo, almacenamiento, pantalla, ram, bateria, stock) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($marca, $modelo, $precio, $codigo, $almacenamiento, $pantalla, $ram, $bateria, $stock));
    }

    function deleteReacondicionadoFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM reacondicionados WHERE id_reacondicionado=?");
        $sentencia->execute(array($id));
    }

    function updateReacondicionadoFromDB($id, $id_marca,  $modelo, $precio, $codigo, $almacenamiento, $pantalla, $ram, $bateria, $stock){
        $sentencia = $this->db->prepare("UPDATE reacondicionados SET id_marca='$id_marca', modelo='$modelo', precio='$precio', codigo='$codigo', almacenamiento='$almacenamiento', pantalla='$pantalla', ram='$ram', bateria='$bateria', stock='$stock' WHERE id_reacondicionado =?");
        $sentencia->execute(array($id));
    }

    function getReacondicionado($id){
        $sentencia = $this->db->prepare( "SELECT * FROM reacondicionados as r INNER JOIN marcas as m  ON r.id_marca=m.id_marca WHERE id_reacondicionado=?");
        $sentencia->execute(array($id));
        $reacondicionado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $reacondicionado;   
    }

    function getReacondicionadoMultitabla(){
        $sentencia = $this->db->prepare("SELECT * FROM reacondicionados as r INNER JOIN marcas as m ON r.id_marca=m.id_marca");
        $sentencia->execute();
        $reacondicionado= $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $reacondicionado;
    }
}

?>

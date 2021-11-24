<?php

class MarcasModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=csv_db 6;charset=utf8', 'root', '');
    }

    function getMarcas(){
        $sentencia = $this->db->prepare( "SELECT * FROM `marcas`" );
        $sentencia->execute();
        $marcas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $marcas;
    }

    function deleteMarcaFromDB($id){

        $sentencia = $this->db->prepare("DELETE FROM marcas WHERE id_marca = ?");
        $sentencia->execute(array($id));
    }

    function createMarca($marca, $sistemaoperativo, $path){ 

        $sentencia = $this->db->prepare('INSERT INTO marcas(marca, sistemaoperativo, img) VALUES( ?, ?, ?)');
        $sentencia->execute(array($marca, $sistemaoperativo, $path));
        return $this->db->lastInsertId();
    }

    function uploadImage($image){
        $target = 'img/product/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    function updateMarca( $id_marca, $marca, $sistemaoperativo){

        $sentencia = $this->db->prepare("UPDATE marcas SET marca = ?, sistemaoperativo = ? WHERE id_marca = ?");
        $sentencia->execute(array($marca, $sistemaoperativo, $id_marca));
        return $this->db->lastInsertId();
        
    }

    function getMarca($id){
        $sentencia = $this->db->prepare( "SELECT * FROM marcas WHERE id_marca = ?" );
        $sentencia->execute(array($id));
        $marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $marca;
    }
}

?>
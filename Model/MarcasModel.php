<?php

class MarcasModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=csv_db 6;charset=utf8', 'root', '');
    }

    function getMarcas(){
        $marcasImagenes = [];
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

    function getImagenes(){
        $sentencia = $this->db->prepare("SELECT * FROM marcas WHERE imagenes = ?");
        $sentencia->execute();
        $imagenes = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $imagenes;
    }

    function addImagen($id,$filePath){
        $sentencia_img=$this->db->prepare("INSERT INTO marcas/imagenes (path,id_marca) VALUES(?, ?)");
        $sentencia_img->execute(array($filePath,$id));
    }

    function deleteImagen($path){
        $sentencia = $this->db->prepare("DELETE FROM marcas/imagenes WHERE path=?"); 
        $sentencia->execute(array($path));
    }

    function getImagenMarca($id_marca){
        $sentencia = $this->db->prepare("SELECT * FROM marcas/imagenes WHERE id_marca=?");
        $sentencia->execute(array($id_marca));
        $imagenes = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $imagenes;
    }
}

?>
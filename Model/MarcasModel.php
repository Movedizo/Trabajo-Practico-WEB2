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

    function deleteMarca($id){

        $sentencia = $this->db->prepare("DELETE FROM marcas WHERE id_marca = ?");
        $sentencia->execute(array($id));
    }

    function uploadImage($image){
        $target = 'uploads/' . uniqid() . "." . strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
        move_uploaded_file($image, $target);
        return $target;
    }

    function agregarMarca($marca, $sistemaoperativo, $img = null){ 

        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img);
        $sentencia = $this->db->prepare('INSERT INTO marcas(marca, sistemaoperativo, img) VALUES( ?, ?, ?)');
        $sentencia->execute(array($marca, $sistemaoperativo, $pathImg));
    }

    function updateMarca($marca, $sistemaoperativo, $img = null, $id_marca){

        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img);
        $sentencia = $this->db->prepare("UPDATE marcas SET marca = ?, sistemaoperativo = ?, img=? WHERE id_marca = ?");
        $sentencia->execute(array($marca, $sistemaoperativo, $pathImg, $id_marca));
    }

    function getMarca($id){
        $sentencia = $this->db->prepare( "SELECT * FROM marcas WHERE id_marca = ?" );
        $sentencia->execute(array($id));
        $marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $marca;
    }
}

?>
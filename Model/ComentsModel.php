<?php

class ComentsModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=csv_db 6;charset=utf8', 'root', '');
    }

    function getComent($idComent){
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_reacondicionado= ?" );
        $sentencia->execute(array($idComent));
        $coment = $sentencia->fetch(PDO::FETCH_OBJ);
        return $coment;
    }

    function getComents(){
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios");
        $sentencia->execute();
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $coments;
    }

    function createComent($id_reacondicionado, $id_usuario,$comentario, $puntaje, $fecha){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(null, id_usuario, id_reacondicionado, comentario, puntaje, fecha) VALUES(?,?,?,?,?");
        $sentencia->execute(array( $id_reacondicionado, $id_usuario,$comentario, $puntaje, $fecha));
        $id=$this->db->lastInsertId();
        return $id;
        
    }
}

?>
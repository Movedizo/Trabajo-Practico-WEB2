<?php

class ComentsModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=csv_db 6;charset=utf8', 'root', '');
    }

    function getComent($id){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id = ?");
        $sentencia->execute(array($id));
        $coment = $sentencia->fetch(PDO::FETCH_OBJ);
        return $coment;
    }

    function getComents($id_reacondicionado){
        $sentencia = $this->db->prepare("SELECT comentarios.*, usuario.usuario FROM comentarios LEFT JOIN usuario
                ON comentarios.id_usuario = usuario.id_usuario
                WHERE id_reacondicionados = ?" );
        $sentencia->execute($id_reacondicionado);
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $coments;
    }

    function createComent($comentario, $puntaje, $fecha, $id_reacondicionado, $id_usuario){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(id, id_usuario, id_reacondicionado, comentario, puntaje, fecha) VALUES (NULL, ?, ?, ?, ?, ?");
        $sentencia->execute(array($comentario, $puntaje, $fecha, $id_reacondicionado, $id_usuario));
        return $this->db->lastInsertId();
    }

    function deleteComent($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id = ?");
        $sentencia->execute(array($id));
    }
}
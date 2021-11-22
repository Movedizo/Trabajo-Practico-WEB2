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

    function getComents(){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios");
        $sentencia->execute();
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

    function getComentsDereacondicionado($id){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_reacondicionado=?");
        $sentencia->execute(array($id));
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $coments;
    }

    function getComentsFiltradosOrdenados($sort, $order, $puntaje, $idReacondicionado){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE puntaje=? AND id_reacondicionado=? ORDER BY $sort $order");
        $sentencia->execute(array($puntaje, $idReacondicionado));
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $coments;
    }

    function getComentsOrdenados($sort, $order, $idReacondicionado){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_reacondicionado=? ORDER BY $sort $order");
        $sentencia->execute(array($idReacondicionado));
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $coments;
    }

    function getComentsFiltrados($puntaje, $idReacondicionados){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE puntaje=? AND id_reacondicionados=?");
        $sentencia->execute(array($puntaje,$idReacondicionados));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }



}
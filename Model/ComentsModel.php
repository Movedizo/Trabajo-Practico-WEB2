<?php

class ComentsModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=csv_db 6;charset=utf8', 'root', '');
    }

    function getComent($idComent)
    {
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_comentario= ?" );
        $sentencia->execute(array($idComent));
        $coment = $sentencia->fetch(PDO::FETCH_OBJ); 
        return $coment;
    }

    function getComents()
    {
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios");
        $sentencia->execute();
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $coments;
    }

    function getComentByReacondicionados($idReacondicionado)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_reacondicionado = ?" );
        $sentencia->execute(array($idReacondicionado));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ); 
        return $comentarios;
    }
    
    function insertarComent($id_usuario,$id_reacondicionado,$comentario, $puntaje)
    {
        $sentencia = $this->db->prepare("INSERT INTO comentarios(id_usuario,id_reacondicionado, comentario, puntaje) VALUES(?,?,?,?)");
        $sentencia->execute(array($id_usuario,$id_reacondicionado,$comentario, $puntaje));
        return $this->db->lastInsertId();
    }

    function deleteComent($idComent)
    {
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $query->execute(array($idComent));
    }
}

?>
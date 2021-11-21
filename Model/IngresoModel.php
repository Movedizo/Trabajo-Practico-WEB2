<?php

class IngresoModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=csv_db 6;charset=utf8', 'root', '');
    }

    function getAcceso($usuario){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE usuario = ?');
        $query->execute([$usuario]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getUsuario($idUsuario){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE id = ?');
        $query->execute([$idUsuario]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getUsser(){
        $query = $this->db->prepare('SELECT * FROM usuario');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    function createUsser($userEmail,$userPassword){
            $sentencia = $this->db->prepare('INSERT INTO usuario (usuario, password) VALUES (? , ?)');
            $sentencia->execute([$userEmail,$userPassword]); 
        
}


    function updateUsuarioDB($rol, $idUsuario){
        $sentencia = $this->db->prepare("UPDATE usuario SET rol = ? WHERE id = ?");
        $sentencia->execute(array($rol, $idUsuario));

    }

    function deleteUsuario($idUsuario){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id = ?");
        $sentencia->execute(array($idUsuario));

    }

}

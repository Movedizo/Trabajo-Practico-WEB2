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

    function getUsser(){
        $query = $this->db->prepare('SELECT * FROM usuario');
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    function createUsser($userEmail,$userPassword){
            $sentencia = $this->db->prepare('INSERT INTO usuarios (usuario, password) VALUES (? , ?)');
            $sentencia->execute([$userEmail,$userPassword]); 
        
}
}

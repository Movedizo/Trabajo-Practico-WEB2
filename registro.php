<?php 
   function renderForm(){
       echo '<h2>Registro</h2>
           <form method="POST">
               <input type="text" name="usuario" placeholder="Ingrese su usuario..."/>
               <input type="password" name="password" placeholder="Ingrese su password..."/>
               <button>Crear cuenta</button>
           </form>';
    }

   renderForm();

    if(!empty($_POST['usuario'])&& !empty($_POST['password'])){
    $userEmail=$_POST['usuario'];
    $userPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);

    $db = new PDO('mysql:host=localhost;'.'dbname=csv_db 6;charset=utf8', 'root', '');
    $query = $db->prepare('INSERT INTO usuarios (usuario, password) VALUES (? , ?)');
    $query->execute([$userEmail,$userPassword]); 
}
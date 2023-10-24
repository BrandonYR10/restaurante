<?php

include('config.php');
session_start();

if (isset($_POST['register'])) {

    $nombre = $_POST['nombre'];    
    $email = $_POST['email'];     
    $telefono = $_POST['telefono'];  
    $motivo=$_POST['motivo']; 
    $comentario=$_POST['comentario']; 
    
    $query = $connection->prepare("SELECT * FROM contactanos WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error" style="text-align: center;">¡Su solicitud ya fue registrada, espere con calma a que uno de nuestros asistentes se contacte con usted.!</p>';
    }

    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO contactanos(nombre,email,telefono,motivo,comentario) VALUES (:nombre,:email,:telefono,:motivo,:comentario)");
        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);      
       $query->bindParam("email", $email, PDO::PARAM_STR);
       $query->bindParam("telefono", $telefono, PDO::PARAM_STR);
        
        $query->bindParam('motivo', $motivo, PDO::PARAM_STR);
       $query->bindParam('comentario', $comentario, PDO::PARAM_STR);
       
        $result = $query->execute();

        if ($result) {
            echo '<p class="success" style="text-align: center;">¡Tu registro fue exitoso!</p>';
        } else {
            echo '<p class="error" style="text-align: center;">¡Algo salió mal!</p>';
        }
    }
}

?>

<?php

include('config.php');
session_start();

if (isset($_POST['register'])) {

   
    
    $correo= $_POST['correo'];     
    
    
    $query = $connection->prepare("SELECT * FROM compras WHERE correo=:correo");
    $query->bindParam("correo", $correo, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error" style="text-align: center;">¡Tus comprass estan siendo procesadas,espere!</p>';
    }

    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO compras(cliente,correo,precio,cantidad,subtotal) VALUES (:cliente,:correo)");
    
       $query->bindParam("correo", $correo, PDO::PARAM_STR);
            
        $result = $query->execute();

        if ($result) {
            echo '<p class="success" style="text-align: center;">¡Tu compras fue exitoso!</p>';
        } else {
            echo '<p class="error" style="text-align: center;">¡Algo salió mal!</p>';
        }
    }
}

?>

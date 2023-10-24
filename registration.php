<?php

include('config.php');
session_start();

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $lastname = $_POST['lastname'];  
    $email = $_POST['email'];  
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $fechareg=date("d/m/y");
    
    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error" style="text-align: center;">¡La dirección de correo electrónico ya está registrada!</p>';
    }

    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(username,lastname,email,password,fecha) VALUES (:username,:lastname,:email,:password_hash,:fechareg)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
       $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
       $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
       //$fechareg=date("d/m/y");
        $query->bindParam('fechareg', $fechareg, PDO::PARAM_STR);
       
        $result = $query->execute();

        if ($result) {
            echo '<p class="success" style="text-align: center;">¡Tu registro fue exitoso!</p>';
        } else {
            echo '<p class="error" style="text-align: center;">¡Algo salió mal!</p>';
        }
    }
}

?>

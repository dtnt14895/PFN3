<?php
include '../functions/error.php';
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
    
    extract($_POST);

    require("connection.php");

    try {
        $user_id= $_SESSION['usuario']['us_id'];
        $hash = password_hash($password1,PASSWORD_DEFAULT);

        $query = "UPDATE usuario SET us_password='$hash' WHERE us_id='$user_id'";
        $mysqli->query($query);
       
        $_SESSION['success_message'] = "Contraseña Actualizada correctamente";
        
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Error al crear el usuario: " . $e->getMessage();
    }
    header("Location: ../view/profile.php");
};

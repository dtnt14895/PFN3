<?php


include '../functions/error.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    extract($_POST);
    $id_m = $_SESSION['id_mat'];
   require("./connection.php");
  
    
    $query = "UPDATE seleccion SET se_nota='$calificacion', se_mensaje='$mensaje' WHERE se_id='$id'";

    if ($mysqli->query($query) === true) {

        $_SESSION['success_message'] = "Datos actualizados correctamente";
    } else {

      
         $_SESSION['error_message'] = $mysqli->error;
        
    }

    header("Location: ../view/alumnos_m.php?id_m=$id_m ");
    exit;
};

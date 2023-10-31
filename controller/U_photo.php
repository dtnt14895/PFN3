<?php
include '../functions/error.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("connection.php");
    session_start();
   
    extract($_POST);
    $id_m = $_SESSION['id_mat'];
   


    try {

        $file_tmp = $_FILES["profile_photo"]["tmp_name"];
        $file_error = $_FILES["profile_photo"]["error"];
        
        if (!$file_error) {
            move_uploaded_file($file_tmp, "../pictures/clase_" . $id_m);
        }elseif ($file_error != 4) {  
            throw new Exception("Error en la carga de la foto de perfil.");
        }
        
    } catch (Exception $e) {
        $_SESSION['error_message'] = ($file_error === 0 or $file_error === 4) ? "Error al actualizar los datos: " .$e->getMessage(): Error_File($file_error);
    
    }

     header("Location: ../view/alumnos_m.php?id_m=$id_m");
    
    exit;




};

<?php
include '../functions/error.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}
extract($_POST);

    require("./connection.php");
    if ($accion == "create") {
        try {
            
            $query = "INSERT INTO usuario (us_dni, us_name, us_lastname, us_addres, us_birth, us_email, us_password, us_permiso, us_status) VALUES ('$dni','$name', '$lastname', '$addres', '$birth', '$email', 'hashedpassword', 3, 1)";
        
            $mysqli->query($query);
            $_SESSION['success_message'] = "Alumno creado correctamente,Contraseña: default <b>Ingrese a su cuenta para cambiarla</b>";
           
        } catch (Exception $e) {
          
            $_SESSION['error_message'] = Error_SQL($e);
        }
    } elseif ($accion == "update") {
        try {
            $query = "UPDATE usuario SET us_dni='$dni', us_email='$email', us_name='$name', us_lastname='$lastname', us_addres='$addres', us_birth='$birth' WHERE us_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Datos actualizados correctamente";
        } catch (Exception $e) {
            
            $_SESSION['error_message'] = Error_SQL($e);
        }
    } elseif ($accion == "delete") {
        try {
            $query = "DELETE FROM usuario WHERE us_id='$id'";   
            $mysqli->query($query);

            $_SESSION['success_message'] = "Alumno eliminado correctamente";
        } catch (Exception $e) {
           
            $_SESSION['error_message'] = Error_SQL($e);
        }
    }

    header("Location: ../view/alumnos.php");
    exit;
}

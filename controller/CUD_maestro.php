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
            $query = "INSERT INTO usuario (us_name, us_lastname, us_addres, us_birth, us_email, us_password, us_permiso, us_status) VALUES ('$name', '$lastname', '$addres', '$birth', '$email', 'hashedpassword', 2, 1)";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Maestro creado correctamente,<b>Contraseña: default. Ingrese a su cuenta para cambiarla</b>";
        } catch (Exception $e) {
            $_SESSION['error_message'] = Error_SQL($e);
        }
    } elseif ($accion == "update") {
        try {
            $tiposSeleccionados = isset($_POST["item"]) ? implode(', ', $_POST["item"]) : array();
            if ($tiposSeleccionados) {
                $mysqli->query("UPDATE `materia` SET `ma_profesor` = null WHERE ma_profesor = $id AND ma_id NOT IN ($tiposSeleccionados)");
            }

            $query = "UPDATE usuario SET us_email='$email', us_name='$name', us_lastname='$lastname', us_addres='$addres', us_birth='$birth' WHERE us_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Datos actualizados correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = Error_SQL($e);
        }
    } elseif ($accion == "delete") {
        try {
            $query = "DELETE FROM usuario WHERE us_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Maestro eliminado correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = Error_SQL($e);
        }
    }
    

    header("Location: ../view/maestros.php");
    exit;
}
?>

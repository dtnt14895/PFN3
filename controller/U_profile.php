<?php
include '../functions/error.php';

include '../functions/error.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("connection.php");
    session_start();
    foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}
extract($_POST);
    var_dump($_POST);


    try {

        $user_id = $_SESSION['usuario']['us_id'];
        $matricula = $matricula ?? $_SESSION['usuario']['us_dni'];
        $file_tmp = $_FILES["profile_photo"]["tmp_name"];
        $file_error = $_FILES["profile_photo"]["error"];
        $query = "UPDATE usuario SET `us_name` = '$nombre',`us_lastname` = '$apellido',`us_dni` = '$matricula',`us_addres` = '$addres',`us_birth` = '$birth' WHERE us_id='$user_id'";
    
        $mysqli->query($query);

        if (!$file_error) {
            move_uploaded_file($file_tmp, "../pictures/user_" . $user_id);
        }elseif ($file_error != 4) {  
            throw new Exception("Error en la carga de la foto de perfil.");
        }

        $resultado = $mysqli->query("select * from usuario where us_id = '$user_id'");
        $_SESSION['usuario'] = $resultado->fetch_assoc();
        $_SESSION['success_message'] = "Datos actualizados correctamente";
        
    } catch (Exception $e) {
        $_SESSION['error_message'] = ($file_error === 0 or $file_error === 4) ? "Error al actualizar los datos: " .$e->getMessage(): Error_File($file_error);
    
    }

    header("Location: ../view/profile.php");
    exit;




};

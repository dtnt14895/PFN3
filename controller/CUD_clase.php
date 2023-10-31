<?php
include '../functions/error.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require("./connection.php");
    foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
        }
        extract($_POST);
    if ($accion == "create") {
        try {
            $query = "INSERT INTO materia (ma_nombre, ma_profesor) VALUES ('$nombre','$profesor')";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Registro creado correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = Error_SQL($e);
        }
    } elseif ($accion == "update") {
        try {
            $query = "UPDATE materia SET ma_nombre='$nombre', ma_profesor='$profesor' WHERE ma_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Datos actualizados correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = Error_SQL($e);
        }
    } elseif ($accion == "delete") {
        try {
            $query = "DELETE FROM materia WHERE ma_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Materia eliminada correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = Error_SQL($e);
        }
    }

header("Location: ../view/clases.php");
   exit;
}
?>

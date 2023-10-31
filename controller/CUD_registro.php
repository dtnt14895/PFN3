<?php
include '../functions/error.php';
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
   
    extract($_POST);

    require("./connection.php");

    if ($accion == "create") {

        try {
            
            $id_alum = $_SESSION['usuario']['us_id'];

            foreach ($item as $id_materia) {
            
                $resultado = $mysqli -> query("INSERT INTO seleccion (`se_alumno`, `se_materia`) VALUES ('$id_alum ','$id_materia')"); 
            } 
            $_SESSION['success_message'] = "Datos actualizados correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al seleccionar materias:" . $e->getMessage();
        }
    } elseif ($accion == "delete") {
        try {
            $query = "DELETE FROM seleccion WHERE se_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Materia retirada correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al eliminar el Maestro: " . $e->getMessage();
        }
    }

    header("Location: ../view/clases_a.php");
    exit;
     
};





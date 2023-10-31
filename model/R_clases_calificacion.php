<?php
require_once("../controller/connection.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $resultado = $mysqli->query("select * from vista_materia_calificacion where se_id=$id");

    $result = $resultado->fetch_assoc();
    if (empty($result)) {
        $respuesta = array('status' => false, 'msg' => 'datos no encontrados');
    } else {
        $respuesta = array('status' => true, 'data' => $result);
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
} else {


    $resultado = $mysqli->query("SELECT * FROM vista_materia_calificacion where se_materia = $id_mat ");

    if ($resultado) {
        if ($resultado->num_rows > 0) {
            while ($datos = $resultado->fetch_assoc()) {
?>
                <tr>

                    <td><?php echo $datos['se_id']; ?></td>
                    <td><?php echo $datos['us_name']; ?></td>
                    <td><?php echo EtiquetaCalificaion($datos['se_nota']); ?></td>
                    <td><?php echo EtiquetaMensaje($datos['se_mensaje']) ?></td>
                    <td>
                        <img onclick="EditarCalificacion(<?php echo $datos['se_id']; ?>)" data-modal-target="calificacion-modal" data-modal-toggle="calificacion-modal" class="cursor-pointer" src="../svg/edit.svg" alt="">
                    </td>
                </tr>
<?php
            }
        }
    } else {
        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
    }
}

?>
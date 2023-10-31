<?php
require_once("../controller/connection.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $resultado = $mysqli->query("select * from usuario where us_id=$id");

    $result = $resultado->fetch_assoc();
    if (empty($result)) {
        $respuesta = array('status' => false, 'msg' => 'datos no encontrados');
    } else {
        $respuesta = array('status' => true, 'data' => $result);
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
} else {


    $resultado = $mysqli->query("select * from usuario");

    if ($resultado) {
        if ($resultado->num_rows > 0) {
            while ($datos = $resultado->fetch_assoc()) {
?>
                <tr>
                    <td><?php echo $datos['us_id']; ?></td>
                    <td><?php echo $datos['us_email']; ?></td>
                    <td><?php echo  EtiquetaPermiso($datos['us_permiso']); ?></td>
                    <td><?php echo  EtiquetaEstado($datos['us_status']); ?></td>
                    <td><img onclick="EditarPermisos(<?php echo $datos['us_id']; ?>)" data-modal-target="permiso-modal" data-modal-toggle="permiso-modal" src="../svg/edit.svg" alt=""></td>
                </tr>
<?php
            }
        }
    } else {
        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
    }
}

?>
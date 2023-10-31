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
    
    $id_alum = $_SESSION['usuario']['us_id'];
    $resultado = $mysqli->query("select * from materia LEFT join seleccion ON se_materia = ma_id WHERE ma_id not in (SELECT se_materia FROM seleccion WHERE se_alumno = '$id_alum') GROUP by ma_id ");


    if ($resultado) {
        if ($resultado->num_rows > 0) {
            while ($datos = $resultado->fetch_assoc()) {
    ?>

                <label>
                    <input type="checkbox" name="item[]" value="<?php echo $datos['ma_id']; ?>" class="sr-only peer ">
                    <span class="block ps-2 peer peer-checked:bg-blue-200"><?php echo $datos['ma_nombre']; ?></span>
                </label>
    
    <?php
            }
        }
    } else {
        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
    }
}

?>
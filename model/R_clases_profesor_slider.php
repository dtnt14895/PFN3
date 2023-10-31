<?php
require_once("../controller/connection.php");

$id_usu = $_SESSION['usuario']['us_id'];

$resultado = $mysqli->query("SELECT * FROM vista_materia_profe_alumno where ma_profesor_id = $id_usu ");



if ($resultado) {
    if ($resultado->num_rows > 0) {
        while ($datos = $resultado->fetch_assoc()) {
            $materiasIds[] = $datos['ma_id'];
?>
            <li>
                <a href="./alumnos_m.php?id_m=<?php echo $datos['ma_id']; ?>" class="flex w-full gap-2 items-center whitespace-nowrap px-1 py-2 bg-gray-sl  transform duration-300"><?php echo $datos['ma_nombre']; ?></a>
            </li>
        <?php

        }
        $_SESSION['materias_ids'] = $materiasIds;
    } else {
        ?>
            <li>
                <a class="flex w-full gap-2 items-center whitespace-nowrap px-1 py-2 bg-gray-sl  transform duration-300">Usted No tiene clases asignadas</a>
            </li>

       
<?php
    }
} else {
    echo "<li><a colspan='5'>Error executing the query: " . $mysqli->error . "</a></li>";
}


?>
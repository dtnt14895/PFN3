<?php
require_once("../controller/connection.php");

$id_usuario = $_SESSION['usuario']['us_id'];

$resultado = $mysqli->query("SELECT * FROM vista_materia_profe_alumno where ma_profesor_id = $id_usuario ");

if ($resultado) {
    if ($resultado->num_rows > 0) {
        while ($datos = $resultado->fetch_assoc()) {
?>
            <div class="flex flex-col items-center w-60 bg-white dark:bg-gray-700 rounded-md p-4 shadow-xl ">
                <div class="w-full h-40 rounded-md overflow-hidden  bg-blue-200">
                    <img class="w-full h-full object-cover" src="../pictures/<?php echo is_file("../pictures/clase_" . $datos['ma_id']) ? "clase_" . $datos['ma_id'] : "school.svg" ?>" alt="">
                </div>
                <span class="font-bold "> <?php echo $datos['ma_nombre']; ?></span>
                <span>Alumnos: <?php echo  EtiquetaCantiodadAlumno($datos['cantidad']); ?></span>
                <a href="./alumnos_m.php?id_m=<?php echo $datos['ma_id']; ?>"><img class="bg-blue-200 rounded-md p-1 w-16 h-6 " src="../svg/eyes.svg" alt=""></a>

            </div>
        <?php
        }
    } else {
        ?>

        <div class=" text-gray-700 flex flex-col items-center w-full bg-white rounded-md p-4 shadow-xl mt-7 text-lg font-bold">
            <span>Usted No tiene clases asignadas </span>
            <span>Pongase en contacto con el Adminsitrador u direccor inmediato para mas informacion</span>
         </div>
<?php
    }
} else {
    echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
}


?>
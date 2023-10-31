<?php include '../template/header.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    die();
}
if (!isset($_SESSION['materias_ids']) || !in_array($_GET['id_m'], $_SESSION['materias_ids'])) {
    header("Location: ./clases_m.php");
    die();
}
$id_mat = $_GET['id_m'];
$_SESSION['id_mat'] = $_GET['id_m'];
$resultado = $mysqli->query("SELECT * FROM materia where ma_id = $id_mat");
$datos = $resultado->fetch_assoc();

?>
<main class="h-full flex flex-col bg-gray-200 dark:bg-gray-800 mx-3 dark:text-white">

    <script>
        $(document).ready(function() {
            $('#table_alumno').DataTable();
        });
    </script>

    <div class=" flex justify-between my-4">
        <div class="flex items-center gap-4">
            
           <form action="../controller/U_photo.php" enctype="multipart/form-data" id="photoForm" method="post" class=" relative ">
                <label class="w-fit flex gap-5 items-center cursor-pointer">
                    <input id="photo_clase" type="file" name="profile_photo" accept="image/*" class="hidden" onchange="showImg(event)">
                    <div class="h-12 w-12 flex items-center justify-center overflow-hidden relative rounded-lg">
                        <img class="absolute w-1/3" src="../svg/camara.svg" alt="">
                        <img id="imagePreview" class="w-full h-full object-cover bg-blue-200" src="../pictures/<?php echo is_file("../pictures/clase_" . $id_mat) ? "clase_" . $id_mat : "school.svg" ?>" alt="">
                    </div>
                </label>
            </form>

            <h1 class="text-2xl">Alumnos de la clase de <?php echo $datos['ma_nombre']; ?></h1>
        </div>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span class="text-gray-600 dark:text-gray-400"><?php echo $datos['ma_nombre']; ?></span></span>
    </div>

    



    <div class="w-full bg-white dark:bg-gray-700 rounded-md shadow-md">
        <div class="relative flex justify-between items-center border-b p-2">
            <span class="block ">Lista de Alumnos</span>
            <?php
            if (isset($_SESSION['error_message'])) {
                echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out bottom-8">' . $_SESSION['error_message'] . '</p>';
                unset($_SESSION['error_message']);
            }
            if (isset($_SESSION['success_message'])) {
                echo '<span id="msj" class="text-green-500 w-full text-center absolute transform duration-500 ease-in-out left-0 bottom-8">' . $_SESSION['success_message'] . '</span>';
                unset($_SESSION['success_message']);
            }
            ?>
        
        
        </div>


        <div class="p-4">
            <table id="table_alumno" class="display table table-bordered  " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de Alumno</th>
                        <th>Calificacion</th>
                        <th>Mensaje</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php include "../model/R_clases_calificacion.php" ?>
                
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre de Alumno</th>
                        <th>Calificacion</th>
                        <th>Mensaje</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    
</main>

<?php include  '../layout/modalCalificacion.php' ?>
<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>
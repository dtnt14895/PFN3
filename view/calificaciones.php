<?php include '../template/header.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    die();
}
?>
<main class="h-full flex flex-col bg-gray-200 dark:bg-gray-800 mx-3 dark:text-white">

    <script>
        $(document).ready(function() {
            $('#table_calificacion').DataTable();
        });
    </script>

    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Calificaciones y mensajes de tus clases</h1>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span class="text-gray-600 dark:text-gray-400">Mis calificaciones</span></span>
    </div>

    <div class="w-full bg-white dark:bg-gray-700 rounded-md shadow-md">
        <div class="relative flex justify-between items-center border-b p-2">
            <span class="block ">Calificaciones y mensajes de tus clases</span>
        </div>


        <div class="p-4">
            <table id="table_calificacion" class="display table table-bordered  " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de clase</th>
                        <th>Calificacion</th>
                        <th>Mensaje</th>
                       
                    </tr>
                </thead>
                <tbody>
                <?php include "../model/R_alumno_calificacion.php" ?>
                
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre de clase</th>
                        <th>Calificacion</th>
                        <th>Mensaje</th>    
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    
</main>

<?php include  '../layout/modalCalificacion.php' ?>
<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>
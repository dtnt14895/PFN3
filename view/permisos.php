<?php include '../template/header.php';

?>
<main class="h-full flex flex-col bg-gray-200 dark:bg-gray-800 mx-3 dark:text-white">


    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>

    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Lista de Permisos</h1>
        <span class="text-sm text-blue-900 dark:text-blue-600">Inicio / <span class="text-gray-300 dark:text-gray-600">Permisos</span></span>
    </div>

    <div class="w-full bg-white dark:bg-gray-700 rounded-md shadow-md">
        <div class="relative block w-full border-b p-2 ">
            <span >Informacion de Persmisos</span>
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
            <table id="table_id" class="display table " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email/Usuario</th>
                        <th>Permiso</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php include "../model/R_permisos.php" ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Email/Usuario</th>
                        <th>Permiso</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</main>

<?php include  '../layout/modalPermiso.php' ?>
<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>
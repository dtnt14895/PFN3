<?php include '../template/header.php' ?>
<main class="h-full flex flex-col bg-gray-200 dark:bg-gray-800 mx-3 dark:text-white">

    <script>
        $(document).ready(function() {
            $('#table_clase').DataTable();
        });
    </script>



    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Lista de Clases</h1>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span class="text-gray-600 dark:text-gray-400">Clases</span></span>
    </div>

    <div class="w-full bg-white dark:bg-gray-700 rounded-md shadow-md">
        <div class="relative flex justify-between items-center border-b p-2">
            <span class="block ">Informacion de Clase</span>
            <button data-modal-target="clase-modal" data-modal-toggle="clase-modal" type="submit" class="w-fit    text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar clase</button>
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
            <table id="table_clase" class="display table table-bordered  " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Clases</th>

                        <th>Maestro</th>

                        <th>Alumnos Inscritos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php include "../model/R_clases.php" ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Clases</th>

                        <th>Maestro</th>

                        <th>Alumnos Inscritos</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</main>

<?php include  '../layout/modalClase.php' ?>
<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>
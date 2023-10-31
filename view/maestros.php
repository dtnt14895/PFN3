<?php include '../template/header.php' ?>
<main class="h-full flex flex-col bg-gray-200 dark:bg-gray-800 mx-3 dark:text-white">

    <script>
        $(document).ready(function() {
            $('#table_maestro').DataTable();
        });
        
    </script>

    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Lista de Maestros</h1>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span class="text-gray-600 dark:text-gray-400">Maestros</span></span>
    </div>

    <div class="w-full bg-white dark:bg-gray-700 rounded-md shadow-md">
        <div class=" flex justify-between items-center border-b p-2 relative">
            <span class="block ">Informacion de Maestros</span>
            <button data-modal-target="maestro-modal" data-modal-toggle="maestro-modal" type="submit" class="w-fit    text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar Maestro</button>
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
            <table id="table_maestro" class="display table table-bordered  " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Fec. De Nacimiento</th>
                        <th>Clase Asignada</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php include "../model/R_maestros.php" ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Fec. De Nacimiento</th>
                        <th>Clase Asignada</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        
    </div>
    
</main>

<?php include  '../layout/modalMaestro.php' ?>
<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>
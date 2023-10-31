<?php include '../template/header.php'

?>
<main class="h-full flex flex-col bg-gray-200 dark:bg-gray-800 mx-3 dark:text-white">

    <script>
        $(document).ready(function() {
            $('#table_clase').DataTable();
        });
    </script>


        <!-- titulo -->
    <div class="relative flex justify-between my-4">
        <h1 class="text-2xl">Esquema de Clases</h1>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span class="text-gray-600 dark:text-gray-400">Clases</span></span>
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

    <div class="flex gap-4">
       <!-- izquierd -->
        <div class=" flex flex-col w-full bg-white dark:bg-gray-700 rounded-md shadow-md">
            <span class="flex border-b p-2">
                Tus Materias Inscritas
            </span>
            <div class="flex w-full gap-4 p-4">
                <table id="table_clase" class="display table table-bordered w-screen " >
                    <thead >
                        <tr >
                            <th class="w-auto ">#</th>
                            <th class="w-80">Materia</th>
                            <th class="w-80">Darse de baja</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php include "../model/R_alumno_retiro.php" ?>
                    </tbody>
                </table>
            </div>
        </div>
        
<!-- derecha -->
        <div class="flex flex-col w-1/2 bg-white dark:bg-gray-700 rounded-md shadow-md">
            <span class="flex border-b p-2">
                Materias para inscribir
            </span>

            <div class="flex flex-col gap-2 m-4">
            <span class="font-bold ">Selecciona las Clases usa la tecla Ctrl</span>

               
                <button type="submit" class="self-end mt-2    bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Inscribir
            </button>

            </form>
            
            </div>
        </div>



    </div>


    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out mb-8 bottom-8">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
    }
    ?>

    <script>




    </script>




</main>


<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>
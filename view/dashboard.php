<?php 
include '../template/header.php';


?>

<main class="h-full min-h-full flex flex-col bg-gray-200 dark:bg-gray-800 mx-3 dark:text-white ">
    <div class="w-full flex justify-between my-4">
        <h1 class="text-2xl ">Dashboard</h1>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span class="text-gray-600 dark:text-gray-400">Dashboard</span></span>
    </div>

    <div class="w-fit bg-white dark:bg-gray-700 p-2 rounded-md pe-4 shadow-md">
        Bienvenido<br> Selecciona la acción que quieras realizar en las pestañas del menú de la izquierda.
    </div>
</main>



<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>
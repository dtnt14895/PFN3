<?php include '../template/header.php' ?>

<main class="h-full flex flex-col bg-gray-200 dark:bg-gray-800 mx-3 dark:text-white">

    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Editar datos de perfil</h1>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span class="text-gray-600 dark:text-gray-400">Perfil</span></span>
    </div>

    <div class="w-full bg-white dark:bg-gray-700 rounded-md shadow-md  mb-4">
        <div class=" relative flex justify-between items-center border-b p-2">
            <span class="block ">Informacion de Usuario</span>
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

        <form action="../controller/U_profile.php" enctype="multipart/form-data" id="maestroForm" method="post" class="space-y-6 relative p-4" action="#">


            <label class="w-fit flex gap-5 items-center cursor-pointer">
                <input type="file" name="profile_photo" accept="image/*" class="hidden" onchange="showImg(event)">
                <div class="h-18 w-18 flex items-center justify-center overflow-hidden relative rounded-lg">
                    <img class="absolute w-1/3" src="../svg/camara.svg" alt="">
                    <img id="imagePreview" class="w-full h-full object-cover" src="../pictures/<?php echo is_file("../pictures/user_" . $us_id) ? "user_" . $us_id : "usuario.jpg" ?>" alt="">
                </div>
                <h3 class="w-52 text-gray-500">CAMBIAR FOTO</h3>
            </label>

            <?php if ($us_permiso == 3) : ?>
                <label class="block text-sm font-medium text-gray-900 dark:text-white">Matricula
                    <input type="text" name="matricula" value="<?php echo $us_dni; ?>" autocomplete="off" placeholder="Ingrese el apellido" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </label>
            <?php endif; ?>

            <label class="block text-sm font-medium text-gray-900 dark:text-white">Correo Electronico
                <input disabled type="email" name="email" value="<?php echo $us_email; ?>" autocomplete="off" placeholder="Ingrese el email" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>

            <label class="block text-sm font-medium text-gray-900 dark:text-white"> Password
                <div class="relative flex items-center  w-full">
                    <input disabled placeholder="Enter your password..." name="password" class="w-full text-sm border border-gray-400 rounded-xl bg-transparent p-3 pr-10" value="*********">
                    <img data-modal-target="password-modal" data-modal-toggle="password-modal" id="edit_password" class="absolute right-4 w-5 h-5 cursor-pointer" src="../svg/lapiz.svg" alt="">
                </div>
            </label>

            <label class="block text-sm font-medium text-gray-900 dark:text-white">Nombre
                <input type="text" name="nombre" value="<?php echo $us_name; ?>" autocomplete="off" placeholder="Ingrese el nombre" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>
            <label class="block text-sm font-medium text-gray-900 dark:text-white">Apellido
                <input type="text" name="apellido" value="<?php echo $us_lastname; ?>" autocomplete="off" placeholder="Ingrese el apellido" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>

            <label class="block text-sm font-medium text-gray-900 dark:text-white">Direccion
                <input type="text" name="addres" value="<?php echo $us_addres; ?>" autocomplete="off" placeholder="Ingrese la direccion" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>
            <label class="block text-sm font-medium text-gray-900 dark:text-white">Fecha de Nacimiento
                <input type="date" name="birth" value="<?php echo $us_birth; ?>" autocomplete="off" placeholder="dd/mm/yyyy" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>

            <div id="btn_modal" class="flex justify-between gap-2 mt-2">
                <button type="submit" class="w-fit   text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar cambios</button>
                <a href="./dashboard.php" class="w-fit text-white bg-gray-600 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</a>
            </div>
        </form>



    </div>


</main>

<?php include  '../layout/modalPassword.php' ?>

<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>



<!-- Main modal -->
<div id="permiso-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden  overflow-y-auto hidden md:inset-0 h-[98%] max-h-full">
    <!-- cuadro -->
    <div class="relative w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700 px-6 py-6 lg:px-8">

        <!-- salir -->
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="permiso-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>

        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar Permisos</h3>

        <form action="../controller/U_permisos.php" id="modalpermiso" method="post" class="space-y-6 relative" action="#">

            <input type="hidden" name="id" >

            <label class="block text-sm font-medium text-gray-900 dark:text-white">Email del Usuario
                <input type="email" name="email" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="ingrese el emain" required>
            </label>

            <label class="block text-sm font-medium text-gray-900 dark:text-white">Rol del usuario
                <select name="permiso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"     placeholder="Acceso">
                    <option value="" disabled selected>Marca</option>
                    <option value="1" >Admin</option>
                    <option value="2" >Maestro</option>
                    <option value="3" >Alumno</option>
                </select>
            </label>

            <label class=" inline-flex items-center cursor-pointer">
                <input type="checkbox" name="status" value="1" class="sr-only peer">
                <div class=" relative w-11 h-5 bg-red-600 peer-checked:bg-green-600 rounded-full peer after:bg-white  after:absolute after:top-[2px] after:left-[2px] after:rounded-full after:h-4 after:w-4 after:transition-all after:duration-300 peer-checked:after:translate-x-6"></div>
                <span class="hidden ml-3 text-sm font-semibold text-gray-900 peer peer-checked:block">Usuario Activo</span>
                <span class=" ml-3 text-sm font-semibold text-gray-900 peer peer-checked:hidden">Usuario Inactivo</span>
            </label>

            <div id="btn_modal" class="flex justify-end gap-2 mt-2">
                <button type="button" data-modal-hide="permiso-modal" class="w-fit text-white bg-gray-600 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</button>
                <button type="submit" class="w-fit   text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>
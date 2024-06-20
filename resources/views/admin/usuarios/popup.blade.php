<div class="p-6">
    <button id="closeModal" class="absolute top-2 right-5 text-3xl text-gray-500 hover:text-gray-800" x-on:click="$dispatch('close')">&times;</button>
    
    <h2 class="text-2xl font-semibold text-center mb-6">Registro</h2>
    <form>
        <div class="grid grid-cols-2 gap-6">
            <div class="flex flex-col">
                <label for="nombres" class="text-sm font-medium text-gray-700">Nombres</label>
                <input type="text" id="nombres" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>
            <div class="flex flex-col">
                <label for="apellidos" class="text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text" id="apellidos" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>
            <div class="flex flex-col">
                <label for="fecha-nacimiento" class="text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                <input type="date" id="fecha-nacimiento" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>
            <div class="flex flex-col">
                <label for="dni" class="text-sm font-medium text-gray-700">DNI</label>
                <input type="text" id="dni" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>
            <div class="flex flex-col">
                <label for="telefono" class="text-sm font-medium text-gray-700">Teléfono</label>
                <input type="tel" id="telefono" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>
            <div class="flex flex-col">
                <label for="correo" class="text-sm font-medium text-gray-700">Correo</label>
                <input type="email" id="correo" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>
            <div class="flex flex-col">
                <label for="password" class="text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>
            <div class="flex flex-col">
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Vuelve a escribir tu contraseña</label>
                <input type="password" id="password_confirmation" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>

            <div class="mt-6 flex col-span-2 justify-end">

                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancelar
                </x-secondary-button>
        
                <x-primary-button id="btnAceptar" class="ml-3 bg-teal-800 hover:bg-teal-700">
                    Aceptar
                </x-primary-button>
            </div>
        </div>
    </form>
</div>
<div class="p-6">
    <button id="closeModal" class="absolute top-2 right-5 text-3xl text-gray-500 hover:text-gray-800" x-on:click="$dispatch('close', resetForm())">&times;</button>
    
    <h2 id="title-popup" class="text-2xl font-semibold text-center mb-6">Registro</h2>
    <form id="form-registro">
        @csrf
        <div class="grid grid-cols-2 gap-6">
            <input type="hidden" id="id" name="id">
            <div class="flex flex-col">
                <label for="nombres" class="text-sm font-medium text-gray-700">Nombres</label>
                <input type="text" id="nombres" name="nombres" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="nombresError"></span>
            </div>
            <div class="flex flex-col">
                <label for="apellidos" class="text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="apellidosError"></span>
            </div>
            <div class="flex flex-col">
                <label for="fechaNac" class="text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                <input type="text" id="fechaNac" name="fechaNac" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="fechaNacError"></span>
            </div>
            <div class="flex flex-col">
                <label for="dni" class="text-sm font-medium text-gray-700">DNI</label>
                <input type="text" id="dni" name="dni" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="dniError"></span>
            </div>
            <div class="flex flex-col">
                <label for="telefono" class="text-sm font-medium text-gray-700">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="telefonoError"></span>
            </div>
            <div class="flex flex-col">
                <label for="email" class="text-sm font-medium text-gray-700">Correo</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="emailError"></span>
            </div>

            <!-- Select -->
            <div class="flex flex-col">
                <label for="idRol">Rol</label>
                <select name="idRol" id="idRol">
                </select>
            </div>
            
            <div id="pwd" class="flex flex-col">
                <label for="password" class="text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="passwordError"></span>
            </div>
            <div id="pwd_confirm" class="flex flex-col">
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Vuelve a escribir tu contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>

            <div class="mt-6 flex col-span-2 justify-end">

                <x-secondary-button id="btnClose" x-on:click="$dispatch('close', resetForm())">
                    Cancelar
                </x-secondary-button>
        
                <x-primary-button id="btnAceptar" class="ml-3 bg-teal-800 hover:bg-teal-700">
                    Aceptar
                </x-primary-button>
            </div>
        </div>
    </form>
</div>
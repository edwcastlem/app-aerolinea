<div class="p-6">
    <button id="closeModal" class="absolute top-2 right-5 text-3xl text-gray-500 hover:text-gray-800" x-on:click="$dispatch('close', resetForm())">&times;</button>
    
    <h2 id="title-popup" class="text-2xl font-semibold text-center mb-6">Registro</h2>
    <form id="form-registro">
        @csrf
        <div class="grid grid-cols-2 gap-6">
            <input type="hidden" id="idAvion" name="idAvion">
            <div class="flex flex-col">
                <label for="modelo" class="text-sm font-medium text-gray-700">Modelo</label>
                <input type="text" id="modelo" name="modelo" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="modeloError"></span>
            </div>
            <div class="flex flex-col">
                <label for="nroRegistro" class="text-sm font-medium text-gray-700">Nro de Registro</label>
                <input type="text" id="nroRegistro" name="nroRegistro" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="nroRegistroError"></span>
            </div>
            <div class="flex flex-col">
                <label for="capacidad" class="text-sm font-medium text-gray-700">Capacidad</label>
                <input type="text" id="capacidad" name="capacidad" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="capacidadError"></span>
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
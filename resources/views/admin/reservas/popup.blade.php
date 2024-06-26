<div class="p-6">
    <button id="closeModal" class="absolute top-2 right-5 text-3xl text-gray-500 hover:text-gray-800" x-on:click="$dispatch('close', resetForm())">&times;</button>
    
    <h2 id="title-popup" class="text-2xl font-semibold text-center mb-6">Registro</h2>
    <form id="form-registro">
        @csrf
        <div class="grid grid-cols-2 gap-6">
            <input type="hidden" id="idVuelo" name="idVuelo">
            <div class="flex flex-col">
                <label for="nroVuelo" class="text-sm font-medium text-gray-700">Nro. de Vuelo</label>
                <input type="text" id="nroVuelo" name="nroVuelo" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="nroVueloError"></span>
            </div>
            <div class="flex flex-col">
                <label for="origen" class="text-sm font-medium text-gray-700">Origen</label>
                <input type="text" id="origen" name="origen" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="origenError"></span>
            </div>
            <div class="flex flex-col">
                <label for="destino" class="text-sm font-medium text-gray-700">Destino</label>
                <input type="text" id="destino" name="destino" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="destinoError"></span>
            </div>
            <div class="flex flex-col">
                <label for="fechaSalida" class="text-sm font-medium text-gray-700">Fecha de Salida</label>
                <input type="text" id="fechaSalida" name="fechaSalida" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="fechaSalidaError"></span>
            </div>
            <div class="flex flex-col">
                <label for="fechaLlegada" class="text-sm font-medium text-gray-700">Fecha de Llegada</label>
                <input type="fechaLlegada" id="fechaLlegada" name="fechaLlegada" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="fechaLlegadaError"></span>
            </div>
            <div class="flex flex-col">
                <label for="precio" class="text-sm font-medium text-gray-700">Precio</label>
                <input type="text" id="precio" name="precio" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="precioError"></span>
            </div>
            <div class="flex flex-col">
                <label for="terminal" class="text-sm font-medium text-gray-700">Terminal</label>
                <input type="text" id="terminal" name="terminal" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                <span class="text-sm text-red-600 mt-1" id="terminalError"></span>
            </div>
            <div class="flex flex-col">
                <label for="puerta" class="text-sm font-medium text-gray-700">Puerta</label>
                <input type="text" id="puerta" name="puerta" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>

            <!-- Selects  -->
            <div class="flex flex-col">
                <label for="idAvion">Avión asignado</label>
                <select name="idAvion" id="idAvion">
                </select>
            </div>
            <div class="flex flex-col">
                <label for="idEstadoVuelo">Estado</label>
                <select name="idEstadoVuelo" id="idEstadoVuelo">
                </select>
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
<x-admin-layout>
    <!-- Componente breadcrumb -->
    @php
        $linksBreadcrumb = [
            'Inicio' => route('admin.dashboard'),
        ];
    @endphp
    @slot('linksBreadcrumb', $linksBreadcrumb)


    <h1 class="text-[2rem] font-bold mb-4">Inicio</h1>

    <div class="grid grid-cols-3 gap-4 mb-4">
        {{-- <div class="flex items-center justify-center h-24 rounded bg-gray-200">
            <p class="text-2xl text-gray-400">

            </p>
        </div> --}}

        <x-aerolinea.info-dash >
            <x-slot name="titulo">USUARIOS</x-slot>
            <x-slot name="contador">{{ $nroUsuarios }}</x-slot>
            <x-slot name="info">registrados</x-slot>
            <x-slot name="icono"><i class="fa-regular fa-circle-user"></i></x-slot>
        </x-aerolinea.info-dash>

        <x-aerolinea.info-dash >
            <x-slot name="titulo">VUELOS</x-slot>
            <x-slot name="contador">{{ $nroVuelos }}</x-slot>
            <x-slot name="info">registrados</x-slot>
            <x-slot name="icono"><i class="fa-solid fa-plane-departure"></i></x-slot>
        </x-aerolinea.info-dash>

        <x-aerolinea.info-dash >
            <x-slot name="titulo">RESERVAS</x-slot>
            <x-slot name="contador">{{ $nroReservas }}</x-slot>
            <x-slot name="info">realizadas</x-slot>
            <x-slot name="icono"><i class="fa-solid fa-file-circle-check"></i></x-slot>
        </x-aerolinea.info-dash>
        
        
    </div>

    <div
        class="block max-w-full p-6 bg-gray-50 border border-teal-800 rounded-lg shadow">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Reportes</h5>
        <button type="button" class="text-white bg-teal-800 min-w-60 hover:bg-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-2 ml-5">
            Reservas por mes
        </button> <br />
        <button type="button" class="text-white bg-teal-800 min-w-60 hover:bg-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-2 ml-5">
            Vuelos por mes
        </button> <br />
        <button type="button" class="text-white bg-teal-800 min-w-60 hover:bg-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-2 ml-5">
            Mensual recaudado
        </button>
        
        <p class="font-normal text-gray-700"></p>
    </div>
</x-admin-layout>

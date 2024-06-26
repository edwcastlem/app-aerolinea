{{-- <div class="flex items-center justify-center h-24 rounded bg-gray-200">
    <p class="text-2xl text-gray-400">
        Usuarios
    </p>

</div> --}}

<div class=" bg-white shadow-md rounded-lg p-6 flex items-center justify-between">
    <div>
        <div class="text-gray-700 font-bold text-lg">{{ $titulo }}</div>
        <div class="text-4xl font-bold text-purple-800">{{ $contador }}</div>
        <div class="text-gray-500">{{ $info }}</div>
    </div>
    <div class="bg-purple-100 p-3 border-solid rounded-full text-2xl">
        {{ $icono }}
    </div>
</div>
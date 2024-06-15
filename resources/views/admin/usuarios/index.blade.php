<x-admin-layout>
    @php
        $linksBreadcrumb = [
            'Inicio' => route('admin.dashboard'),
            'Usuarios' => route('admin.usuarios')
        ];
    @endphp
    @slot('linksBreadcrumb', $linksBreadcrumb)


    <h1 class="text-[2rem] font-bold mb-4">Usuarios</h1>

    <div
        class="block max-w-full p-6 bg-gray-50 border border-teal-800 rounded-lg shadow">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Listado</h5>
        
        
        <p class="font-normal text-gray-700"></p>
    </div>
</x-admin-layout>

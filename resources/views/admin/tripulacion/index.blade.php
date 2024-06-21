<x-admin-layout>
    @php
        $linksBreadcrumb = [
            'Inicio' => route('admin.dashboard'),
            'Usuarios' => route('admin.usuario.index'),
        ];
    @endphp
    @slot('linksBreadcrumb', $linksBreadcrumb)

    <h1 class="text-[2rem] font-bold mb-4">Tripulación</h1>

    <div class="block max-w-full p-6 bg-gray-50 border border-teal-800 rounded-lg shadow">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Listado</h5>

        <!-- Listado  -->
        <div class="relative overflow-x-auto">

            <button id="abrirModal" x-data="" x-on:click.prevent="$dispatch('open-modal', 'tripulacion')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                Nuevo
            </button>

            <!-- Modal para crear/editar  -->
            <x-modal name="tripulacion">
                @include('admin.tripulacion.popup')
            </x-modal>

            <table id="tabla-tripulacion" class="w-full text-sm text-left rtl:text-right text-gray-500 display responsive nowrap">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombres
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellidos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dni
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cargo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>


    @push('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css"> --}}

    @endpush

    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.responsive.min.js"></script> --}}
        
        <script type="module">

            $(document).on('open-modal', function (event) {
                $('#title-popup').text("Nuevo");
            });

            // Inicializamos datatables con los campos
            initDatatable('#tabla-tripulacion', '{{ route('admin.tripulacion.index') }}', [
                { data: 'id', visible: false },
                { data: 'nombres' },
                { data: 'apellidos' },
                { data: 'dni' },
                { data: 'cargo' },
            ]);

            // Configuramos el editar/actualizar
            crearEditar('#tabla-tripulacion', '{{ route('admin.tripulacion.store') }}', '{{ route('admin.tripulacion.update', ':id') }}', '#idTripulacion', (errors) => {
                // asignacion de etiquetas de errores
                $('#nombresError').text(errors.nombres ? errors.nombres[0] : '');
                $('#apellidosError').text(errors.apellidos ? errors.apellidos[0] : '');
                $('#dniError').text(errors.dni ? errors.dni[0] : '');
                $('#cargoError').text(errors.cargo ? errors.cargo[0] : '');
            });

            // Configuramos el mostrar...
            showEdit('#tabla-tripulacion', '#idTripulacion',(fila) => {
                // llenado de los campos del formulario
                $('#nombres').val(fila.nombres);
                $('#apellidos').val(fila.apellidos);
                $('#dni').val(fila.dni);
                $('#cargo').val(fila.cargo);
            });

            //Configuramos el eliminar
            eliminar('#tabla-tripulacion', '{{ route('admin.tripulacion.destroy', ':id') }}', '{{ csrf_token() }}');
            
        </script>
    @endpush
</x-admin-layout>

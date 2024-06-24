<x-admin-layout>
    @php
        $linksBreadcrumb = [
            'Inicio' => route('admin.dashboard'),
            'Usuarios' => route('admin.usuarios.index'),
        ];
    @endphp
    @slot('linksBreadcrumb', $linksBreadcrumb)

    <h1 class="text-[2rem] font-bold mb-4">Gestión de aeronaves</h1>

    <div class="block max-w-full p-6 bg-gray-50 border border-teal-800 rounded-lg shadow">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Aviones</h5>

        <!-- Listado  -->
        <div class="relative overflow-x-auto">

            <button id="abrirModal" x-data="" x-on:click.prevent="$dispatch('open-modal', 'avion'); $dispatch('modo-registrar')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                Registrar avión
            </button>

            <!-- Modal para crear/editar  -->
            <x-modal name="avion">
                @include('admin.aviones.popup')
            </x-modal>

            <table id="tabla-aviones" class="w-full text-sm text-left rtl:text-right text-gray-500 display responsive nowrap">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Modelo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nro de Registro
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Capacidad
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

            let editar;

            $(document).on('open-modal', function (event) {
                $('#title-popup').text("Nuevo");
            });


            //capturamos el evento de alpine
            $(document).on('modo-editar', function(event) {
                editar = true;
            });

            $(document).on('modo-registrar', function(event) {
                editar = false;
            });



            // Inicializamos datatables con los campos
            initDatatable('#tabla-aviones', '{{ route('admin.aviones.index') }}', [
                { data: 'id', visible: false },
                { data: 'modelo' },
                { data: 'nroRegistro' },
                { data: 'capacidad' },
            ]);

            // Configuramos el editar/actualizar
            crearEditar('#tabla-aviones', '{{ route('admin.aviones.store') }}', '{{ route('admin.aviones.update', ':id') }}', '#idAvion', (errors) => {
                // asignacion de etiquetas de errores
                $('#modeloError').text(errors.modelo ? errors.modelo[0] : '');
                $('#nroRegistroError').text(errors.nroRegistro ? errors.nroRegistro[0] : '');
                $('#capacidadError').text(errors.capacidad ? errors.capacidad[0] : '');
            });

            // Configuramos el mostrar...
            showEdit('#tabla-aviones', '#idAvion',(fila) => {
                // llenado de los campos del formulario
                $('#modelo').val(fila.modelo);
                $('#nroRegistro').val(fila.nroRegistro);
                $('#capacidad').val(fila.capacidad);
            });

            //Configuramos el eliminar
            eliminar('#tabla-aviones', '{{ route('admin.aviones.destroy', ':id') }}', '{{ csrf_token() }}');
            
        </script>
    @endpush
</x-admin-layout>

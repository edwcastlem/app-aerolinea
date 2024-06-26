<x-admin-layout>
    @php
        $linksBreadcrumb = [
            'Inicio' => route('admin.dashboard'),
            'Gestion de vuelos' => route('admin.vuelos.index'),
        ];
    @endphp
    @slot('linksBreadcrumb', $linksBreadcrumb)

    <h1 class="text-[2rem] font-bold mb-4">Gestión de Vuelos</h1>

    <div class="block max-w-full p-6 bg-gray-50 border border-teal-800 rounded-lg shadow">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Vuelos</h5>

        <!-- Listado de usuario -->
        <div class="relative overflow-x-auto">

            <button id="abrirModal" x-data="" x-on:click.prevent="$dispatch('modo-registrar'); $dispatch('open-modal', 'popup')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                Nuevo vuelo
            </button>

            <!-- Modal para crear/editar usuario -->
            <x-modal name="popup">
                @include('admin.vuelos.popup')
            </x-modal>

            <table id="tabla-vuelos" class="w-full text-sm text-left rtl:text-right text-gray-500 display responsive nowrap">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Vuelo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Origen
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Destino
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha Salida
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha Llegada
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Terminal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Puerta
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Id Avión
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Avión asignado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Id EstadoVuelo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
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

            let editar = false;

            //capturamos el evento de alpine
            $(document).on('modo-editar', function(event) {
                editar = true;
                //console.log('Capturado diste click en editar - id: ' + $('#idTripulacion').val());
            });

            $(document).on('modo-registrar', function(event) {
                editar = false;
                //console.log('Capturado diste click en Nuevo - id: ' + $('#idTripulación').val());
            });

            $(document).on('open-modal', function(event) {
                $('#title-popup').text("Nuevo Vuelo");

                // Cargamos los selects
                if (!editar) {
                    cargarSelect('#idAvion', '{{ route('admin.aviones.list') }}');
                    cargarSelect('#idEstadoVuelo', '{{ route('admin.estadovuelo.list') }}');
                    console.log("(Estas creando nuevo) He cargado selects - Editar: " + editar);
                }
                else 
                    console.log("(Estas editando) - Editar: " + editar);
            });

            // Configuramos el componente para fecha flatpickr y lo asignamos a una variable para usarlo despues
            let fechaSalidaComponent = flatpickr("#fechaSalida", {
                dateFormat: "d/m/Y H:i",
                enableTime: true,
                //utc: true,
                locale: 'es'
            });

            let fechaLlegadaComponent = flatpickr("#fechaLlegada", {
                dateFormat: "d/m/Y H:i",
                enableTime: true,
                //utc: true,
                locale: 'es'
            });

            // Inicializamos datatables con los campos
            initDatatable('#tabla-vuelos', '{{ route('admin.vuelos.index') }}', [
                { data: 'id', visible: false },
                { data: 'nroVuelo' }, // 1
                { data: 'origen' }, // 2
                { data: 'destino' }, // 3
                { data: 'fechaSalida' }, // 4
                { data: 'fechaLlegada' }, // 5
                { data: 'precio' }, // 6
                { data: 'terminal'}, //7
                { data: 'puerta' },
                { data: 'idAvion',  visible: false },
                { data: 'avion' },
                { data: 'idEstadoVuelo', visible: false },
                { data: 'estadoVuelo' },
            ],
            `<a href="#" class="tripulacion mr-4">
                <i class="fa-solid fa-people-group"></i>
            </a>`,
            [
                {
                    targets: 4,
                    render: DataTable.render.datetime('DD/MM/YYYY HH:mm')
                },
                {
                    targets: 5,
                    render: DataTable.render.datetime('DD/MM/YYYY HH:mm')
                },
                {
                    targets: 6,
                    render: function (data, type, row) {
                        if (type === 'display' || type === 'filter') {
                            let num = parseFloat(data).toFixed(2);
                            return 'S/ ' + num;
                        }
                    return data;
                    }
                }
            ]);

            // Configuramos el editar/actualizar
            crearEditar('#tabla-vuelos', '{{ route('admin.vuelos.store') }}', '{{ route('admin.vuelos.update', ':id') }}', '#idVuelo', (errors) => {
                // asignacion de etiquetas de errores
                $('#nroVueloError').text(errors.nroVuelo ? errors.nroVuelo[0] : '');
                $('#origenError').text(errors.origen ? errors.origen[0] : '');
                $('#destinoError').text(errors.destino ? errors.destino[0] : '');
                $('#fechaSalidaError').text(errors.fechaSalida ? errors.fechaSalida[0] : '');
                $('#fechaLlegadaError').text(errors.fechaLlegada ? errors.fechaLlegada[0] : '');
                $('#precioError').text(errors.precio ? errors.precio[0] : '');
                $('#terminalError').text(errors.terminal ? errors.terminal[0] : '');
                $('#puertaError').text(errors.puerta ? errors.puerta[0] : '');
                $('#estadoVueloError').text(errors.estadoVuelo ? errors.estadoVuelo[0] : '');
                $('#avionError').text(errors.avion ? errors.avion[0] : '');
            });

            // Configuramos el mostrar...
            showEdit('#tabla-vuelos', '#idVuelo', (fila) => {

                // llenado de los campos del formulario
                $('#nroVuelo').val(fila.nroVuelo);
                $('#origen').val(fila.origen);
                $('#destino').val(fila.destino);
                fechaSalidaComponent.setDate(fila.fechaSalida);
                fechaLlegadaComponent.setDate(fila.fechaLlegada);
                $('#precio').val(fila.precio);
                $('#terminal').val(fila.terminal);
                $('#puerta').val(fila.puerta);

                
                // Cargamos los select y seleccionamos la opcion
                cargarSelect('#idAvion', '{{ route('admin.aviones.list') }}')
                        .then( () => $('#idAvion').val(fila.idAvion) );
                
                cargarSelect('#idEstadoVuelo', '{{ route('admin.estadovuelo.list') }}')
                        .then( () => $('#idEstadoVuelo').val(fila.idEstadoVuelo) );
                
                //console.log(`Desde ShowEdit::: fechaSalida: ${fila.fechaSalida} desde el componente fechaSalida: ${flatpickr.formatDate(fechaSalidaComponent, "Y-m-d H:m K")}`)
            });

            // Configuramos el eliminar
            eliminar('#tabla-vuelos', '{{ route('admin.vuelos.destroy', ':id') }}', '{{ csrf_token() }}');


            // Acciones adicionales

            $('#tabla-vuelos tbody').on('click', 'a.tripulacion', function(event) {
                event.preventDefault();

                let fila = $('#tabla-vuelos').DataTable().row($(this).parents('tr')).data();

                alert("Se debe cargar la tripulacion asignada a este vuelo + idVuelo: (id): " + fila.id);

                //var data = $(nombreTabla).DataTable().row($(this).parents('tr')).data();

                /*
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¡No podrás revertir esto!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url.replace(':id', data.id),
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': token_csrf
                        },
                        success: function (response) {
                            Swal.fire('¡Eliminado!', 'Se eliminó el registro.', 'success');
                            $(nombreTabla).DataTable().ajax.reload(); //recarga el datatable
                        },
                        error: function (xhr, status, error) {
                            Swal.fire('Error', 'No se pudo eliminar el registro.', 'error');
                        }
                    });
                }
                });

                */
            });

        </script>
    @endpush
</x-admin-layout>

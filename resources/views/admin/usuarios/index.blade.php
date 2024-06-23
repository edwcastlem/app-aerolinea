<x-admin-layout>
    @php
        $linksBreadcrumb = [
            'Inicio' => route('admin.dashboard'),
            'Usuarios' => route('admin.usuario.index'),
        ];
    @endphp
    @slot('linksBreadcrumb', $linksBreadcrumb)

    <h1 class="text-[2rem] font-bold mb-4">Usuarios</h1>

    <div class="block max-w-full p-6 bg-gray-50 border border-teal-800 rounded-lg shadow">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Listado</h5>

        <!-- Listado de usuario -->
        <div class="relative overflow-x-auto">

            <button id="abrirModal" x-data="" x-on:click.prevent="$dispatch('open-modal', 'usuario'); $dispatch('modo-registrar')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                Nuevo usuario
            </button>

            <!-- Modal para crear/editar usuario -->
            <x-modal name="usuario">
                @include('admin.usuarios.popup')
            </x-modal>

            <table id="tabla-usuarios" class="w-full text-sm text-left rtl:text-right text-gray-500 display responsive nowrap">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombres
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellidos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dni
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefono
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de Nacimiento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rol
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
            });

            $(document).on('modo-registrar', function(event) {
                editar = false;
            });

            // Configuramos el componente para fecha flatpickr y lo asignamos a una variable para usarlo despues
            let fechaNacComponent = flatpickr("#fechaNac", {
                dateFormat: "d/m/Y"
            });

            $(document).on('open-modal', function (event) {
                $('#title-popup').text("Nuevo");

                if (editar) {
                    $('#pwd').addClass('hidden');
                    $('#pwd_confirm').addClass('hidden');
                }
                else {
                    $('#pwd').removeClass('hidden');
                    $('#pwd_confirm').removeClass('hidden');
                }
            });

            // Inicializamos datatables con los campos
            initDatatable('#tabla-usuarios', '{{ route('admin.usuario.index') }}', [
                { data: 'id', visible: false },
                { data: 'nombres' },
                { data: 'apellidos' },
                { data: 'email' },
                { data: 'dni' },
                { data: 'telefono' },
                { data: 'fechaNac'},
                { data: 'rol' },
            ]);

            // Configuramos el editar/actualizar
            crearEditar('#tabla-usuarios', '{{ route('admin.usuario.store') }}', '{{ route('admin.usuario.update', ':id') }}', '#id', (errors) => {
                // asignacion de etiquetas de errores
                $('#nombresError').text(errors.nombres ? errors.nombres[0] : '');
                $('#apellidosError').text(errors.apellidos ? errors.apellidos[0] : '');
                $('#fechaNacError').text(errors.fechaNac ? errors.fechaNac[0] : '');
                $('#dniError').text(errors.dni ? errors.dni[0] : '');
                $('#telefonoError').text(errors.telefono ? errors.telefono[0] : '');
                $('#emailError').text(errors.email ? errors.email[0] : '');
                $('#passwordError').text(errors.password ? errors.password[0] : '');
            });

            // Configuramos el mostrar...
            showEdit('#tabla-usuarios', '#id', (fila) => {

                // llenado de los campos del formulario
                $('#nombres').val(fila.nombres);
                $('#apellidos').val(fila.apellidos);
                fechaNacComponent.setDate(fila.fechaNac);
                $('#telefono').val(fila.telefono);
                $('#dni').val(fila.dni);
                $('#email').val(fila.email);
            });

            //Configuramos el eliminar
            eliminar('#tabla-usuarios', '{{ route('admin.usuario.destroy', ':id') }}', '{{ csrf_token() }}');

        </script>
    @endpush
</x-admin-layout>

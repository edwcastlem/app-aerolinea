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

            <button id="abrirModal" x-data="" x-on:click.prevent="$dispatch('open-modal', 'usuario')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
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
        
        <script>

            // Cargar el modal con ajax
            // $(document).on('open-modal', function (event) {
            //     if (event.detail === 'usuario') {
            //         $.ajax({
            //             url: '{{ route("admin.usuario.create") }}',
            //             method: 'GET',
            //             success: function (data) {
            //                 $('#modal-usuario').html(data);
            //             },
            //             error: function (jqXHR, textStatus, errorThrown) {
            //                 console.error('Error al cargar el contenido del modal:', textStatus, errorThrown);
            //             }
            //         });
            //     }
            // });

            // Registrar usuario (sin la clave xq se edita desde el perfil.)
            // Agrega el evento aunque el control no se haya cargado... (se usa para los modales)
            $(document).on('submit','#form-registro', function(event) {
                event.preventDefault();

                let url = "{{ route('admin.usuario.store') }}";
                let metodo = 'POST';
                let usuarioId = $('#id').val();
                if (usuarioId) {
                    url = "{{ route('admin.usuario.update', ':id') }}".replace(':id', id);
                    metodo = 'PUT';
                }

                $.ajax({
                    url: url,
                    method: metodo,
                    data: $(this).serialize(),
                    success: function(response) {
                        alert("Usuario creado con éxito!!");

                        $('#btnClose').click();
                        $('#tabla-usuarios').DataTable().ajax.reload(); //recarga el datatable
                        $('#form-registro')[0].reset(); //limpiamos el formulario
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        $('#nombresError').text(errors.nombres ? errors.nombres[0] : '');
                        $('#apellidosError').text(errors.apellidos ? errors.apellidos[0] : '');
                        $('#emailError').text(errors.email ? errors.email[0] : '');
                        $('#fechaNacError').text(errors.email ? errors.fechaNac[0] : '');
                        $('#dniError').text(errors.email ? errors.dni[0] : '');
                        $('#telefonoError').text(errors.email ? errors.telefono[0] : '');
                        $('#passwordError').text(errors.password ? errors.password[0] : '');
                    }
                });

            });


            // Componente datatables
            $('#tabla-usuarios').DataTable({
                ajax: "{{ route('admin.usuario.index') }}",
                columns: [
                    { data: 'nombres' },
                    { data: 'apellidos' },
                    { data: 'email' },
                    { data: 'dni' },
                    { data: 'telefono' },
                    { data: 'fechaNac' },
                    { data: 'rol' },
                    { 
                        "data": null, 
                        "defaultContent": `<a href="#" class="editar mr-4"><i class="fa-solid fa-pen-to-square"></i></a><a href="#" class="eliminar mr-4"><i class="fa-solid fa-trash-can"></i></a>`
                    }
                ],
                language: {
                    "emptyTable":     "No hay datos en la tabla!",
                    "info":           "Mostrando _START_ to _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 de 0 de 0 registros",
                    "infoFiltered":   "(filtrando de _MAX_ total de registros)",
                    "lengthMenu":     "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing":     "",
                    "search":         "Buscar:",
                    "zeroRecords":    "No hay registros encontrados",
                },
                responsive: true,
                autoWidth: false,
                //lengthMenu: [[10, 25, 50], [10, 25, 50]],
            });
            $('[name=tabla-usuarios_length').addClass('form-select w-16 py-1 px-2 rounded-md border-gray-300 focus:outline-none focus:ring focus:ring-teal-600 focus:border-teal-500 sm:text-sm');


            // Editar en datatables
            $('#tabla-usuarios tbody').on('click', 'a.editar', function(event) {
                event.preventDefault(); // para que no se ejecute el click en en enlace
                var data = $('#tabla-usuarios').DataTable().row($(this).parents('tr')).data(); // carga toda la fila del dataables

                $('#usuario_id').val(data.id);
                
                // leemos los datos del dtatables
                $('#nombres').val(data.nombres);
                $('#apellidos').val(data.apellidos);
                $('#email').val(data.email);
                $('#dni').val(data.dni);
                $('#fechaNac').val(data.fechaNac);
                $('#telefono').val(data.telefono);
                $('#password').val(data.password);

                console.log(response.data);

                $('#abrirModal').click();
                $('#title-popup').text("Editar");

            });

            $('#tabla-usuarios tbody').on('click', 'a.eliminar', function(event) {
                event.preventDefault();
                var data = $('#tabla-usuarios').DataTable().row($(this).parents('tr')).data();
                alert('Eliminando ' + data.nombres);
            
            });

        </script>
    @endpush
</x-admin-layout>

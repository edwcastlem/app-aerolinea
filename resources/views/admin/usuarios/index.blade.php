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

            <button id="openModal" x-data="" x-on:click.prevent="$dispatch('open-modal', 'crear-usuario')" class="bg-blue-500 text-white px-4 py-2 rounded-md">Abrir modal</button>

            <!-- Modal para crear usuario -->
            <x-modal name="crear-usuario">
                <!-- El contenido del modal se cargará dinámicamente -->
            </x-modal>

            <button type="button" onclick="window.location.href = '{{ route('admin.usuario.create') }}'" 
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
            Crear usuario
            </button>
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
                {{-- <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->nombres }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->apellidos }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->dni }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->telefono }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->fechaNac }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->rol->descripcion }}
                            </td>
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
            {{-- <div class="mt-4">{{ $users->links() }}</div> --}}
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

            // Controlar el modal
            $(document).on('open-modal', function (event) {
                if (event.detail === 'crear-usuario') {
                    $.ajax({
                        url: '{{ route("admin.usuario.create") }}',
                        method: 'GET',
                        success: function (data) {
                            $('#modal-crear-usuario').html(data);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.error('Error al cargar el contenido del modal:', textStatus, errorThrown);
                        }
                    });
                }
            });

            // Agrega el evento aunque el control no se haya cargado... (se usa para los modales)
            $(document).on('click','#btnAceptar', function(event) {
                event.preventDefault();
                alert("¡Se hizo clic en el botón!");
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
            });


            // Para los eventos del datatables
            $('#tabla-usuarios tbody').on('click', 'a.editar', function(event) {
                event.preventDefault(); // para que no se ejecute el click en en enlace
                var data = $('#tabla-usuarios').DataTable().row($(this).parents('tr')).data(); // carga toda la fila del dataables
                

                
                alert('Editando ' + data.nombres);
                
            });

            $('#tabla-usuarios tbody').on('click', 'a.eliminar', function(event) {
                event.preventDefault();
                var data = $('#tabla-usuarios').DataTable().row($(this).parents('tr')).data();
                alert('Eliminando ' + data.nombres);
            
            });

        </script>
    @endpush
</x-admin-layout>

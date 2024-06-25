// Componente datatables

export function initDatatable(nombreTabla, rutaAjax, campos, botonesExtras = false, opcionesColumnas = []) {
    $(nombreTabla).DataTable({
        ajax: rutaAjax,
        columns: campos.concat([
            {
                data: null,
                defaultContent: `
                    <div x-data="" class="flex justify-center">
                        <a x-on:click="$dispatch('modo-editar'); $dispatch('open-modal', 'popup')" href="#" class="editar mr-4">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="#" class="eliminar mr-4">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                        ${botonesExtras ? botonesExtras : ''}
                    </div>
                `
            }
        ]),
        columnDefs: opcionesColumnas,
        language: {
            emptyTable: "No hay datos en la tabla!",
            info: "Mostrando _START_ to _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 de 0 de 0 registros",
            infoFiltered: "(filtrando de _MAX_ total de registros)",
            lengthMenu: "Mostrar _MENU_ registros",
            loadingRecords: "Cargando...",
            processing: "",
            search: "Buscar:",
            zeroRecords: "No hay registros encontrados"
        },
        responsive: true,
        autoWidth: false
    });

    $('[name=' + nombreTabla.replace('#', '') + '_length')
        .addClass('form-select w-16 py-1 px-2 rounded-md border-gray-300 focus:outline-none focus:ring focus:ring-teal-600 focus:border-teal-500 sm:text-sm');
}

// Funcion que se llama automaticamente al cerrar un modal
export function resetForm() {
    // Limpiamos el formulario y las etiquetas de error
    $('#form-registro')[0].reset();
    $('span[id$="Error"]').text('');
    $('input[id^="id"]').val(''); // selecciona el id (los q empiezan por id)
}

/**
 * Todos los campos deben tener el atributo name e id configurado
 * @param {*} nombreTabla Id del form, se debe pasar como selector (#form-registro)
 * @param {*} urlStore Es un string normal, usar route() de laravel
 * @param {*} urlUpdate Es un string normal, usar route() de laravel, usar marcador de posicion para el id
 * @param {*} campoId nombre del id con que viene del controlador, debe ser un selector
 * @param {*} asignarErrores Callback donde se asignara cada etiqueta con su respectivo msje de error
 */
export function crearEditar(nombreTabla, urlStore, urlUpdate, campoId, asignarErrores)
{
    $(document).on('submit','#form-registro', function(event) {
        event.preventDefault();               

        let url = urlStore;
        let metodo = 'POST';
        let id = $(campoId).val();
        if (id) {
            url = urlUpdate.replace(':id', id);
            metodo = 'PUT';
        }

        let modo = ( metodo === 'PUT' ) ? "actualizado" : "registrado";
        let title = modo.replace('do', 'r');

        $.ajax({
            url: url,
            method: metodo,
            data: $(this).serialize(), //  todo lo que tiene asignado el atributo name en el form
            success: function(response) {
                Swal.fire(title.toUpperCase(), modo + " con éxito!!", 'success');

                $('#btnClose').click();
                $(nombreTabla).DataTable().ajax.reload(); //recarga el datatable
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                Swal.fire(title.toUpperCase(), "No se pudo :modo correctamente!!!".replace(':modo', title), 'error');
                asignarErrores(errors);
            }
        });
    });
}

/**
 * 
 * @param {*} nombreTabla Debe ser un selector con el id de la tabla datatables
 * @param {*} campoId nombre del id con que viene del controlador, debe ser un selector
 * @param {*} tituloPopup Titulo del popup
 * @param {fila} llenarCampos Callback que se debe llenar con los campos donde se llenaran los datos,
 *                            fila: es la fila actual del datatables
 */
export function showEdit(nombreTabla, campoId, llenarCampos, tituloPopup = "Editar")
{
    // Editar en datatables
    $(nombreTabla + ' tbody').on('click', 'a.editar', function(event) {
        event.preventDefault(); // para que no se ejecute el click en en enlace

        let fila = $(nombreTabla).DataTable().row($(this).parents('tr')).data(); // carga toda la fila del dataables

        console.log("(ShowEdit) Id vuelo: " + fila.id);

        $(campoId).val(fila.id); //cargamos el id en el campo oculto
        
        // leemos los datos del dtatables
        llenarCampos(fila);

        //console.log(response.data);

        $('#title-popup').text(tituloPopup);
    });
}

/**
 * 
 * @param {*} nombreTabla Debe ser un selector tipo id
 * @param {*} url String normal usando route() de laravel, se debe usar con un marcador de posicion para el id (:id)
 * @param {*} token_csrf token que genera laravel con la funcion csfr_token()
 */
export function eliminar(nombreTabla, url, token_csrf)
{
    $(nombreTabla + ' tbody').on('click', 'a.eliminar', function(event) {
        event.preventDefault();
        var data = $(nombreTabla).DataTable().row($(this).parents('tr')).data();

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
            console.log("ID enviado: " + data.id);
        }
        });
    });
}

/***
 *  idSelect: Debe ser un selector para el id
 *  ruta: la ruta a donde se hara la consulta (usar route de laravel) 
 *  Debe ser una ruta especial que devuelva un data con clave - valor
 **/
// export function cargarSelect(idSelect, ruta)
// {
//     let select = $(idSelect)[0];
//     //let url = selectAvion.getAttribute('data-url');
    
//     $.ajax({
//         url: ruta,
//         method: 'GET',
//         success: function (response) {
//             select.innerHTML = '<option value="">Seleccionar</option';
//             for (let key in response.data) {
//                 select.innerHTML += `<option value="${ key }">${ response.data[key] }</option>`;
//             }
//         },
//         error: function (xhr, status, error) {
//             console.log(error);
//         }
//     });
// }


export function cargarSelect(idSelect, ruta) {
    let select = $(idSelect)[0];
    
    return new Promise((resolve, reject) => {
        $.ajax({
            url: ruta,
            method: 'GET',
            success: function (response) {
                select.innerHTML = '<option value="">Seleccionar</option>';
                for (let key in response.data) {
                    select.innerHTML += `<option value="${key}">${response.data[key]}</option>`;
                }
                resolve(); // Resuelve la promesa cuando el AJAX se completa
            },
            error: function (xhr, status, error) {
                console.log(error);
                reject(error); // Rechaza la promesa en caso de error
            }
        });
    });
}
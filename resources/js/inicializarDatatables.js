// Componente datatables

export function initDatatable(nombreTabla, rutaAjax, campos, nombreSelect)
{
    $(nombreTabla).DataTable({
        ajax: rutaAjax,
        columns: campos.concat([
            { 
                "data": null, 
                "defaultContent": `<a href="#" class="editar mr-4"><i class="fa-solid fa-pen-to-square"></i></a><a href="#" class="eliminar mr-4"><i class="fa-solid fa-trash-can"></i></a>`
            }
        ]),
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
    
    $('[name=' + nombreSelect).addClass('form-select w-16 py-1 px-2 rounded-md border-gray-300 focus:outline-none focus:ring focus:ring-teal-600 focus:border-teal-500 sm:text-sm');
}

export function resetForm() {
    // Limpiamos el formulario y las etiquetas de error
    $('#form-registro')[0].reset();
    $('span[id$="Error"]').text('');
    console.log('ya te limpie!!!');
}
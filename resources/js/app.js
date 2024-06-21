import './bootstrap';

import { initDatatable, resetForm, crearEditar, showEdit, eliminar } from './micrud';

import Swal from 'sweetalert2';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Funciones propias js
window.initDatatable = initDatatable;
window.resetForm = resetForm;
window.eliminar = eliminar;
window.showEdit = showEdit;
window.crearEditar = crearEditar;
window.Swal = Swal;
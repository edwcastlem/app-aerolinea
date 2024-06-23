import './bootstrap';

import { initDatatable, resetForm, crearEditar, showEdit, eliminar } from './micrud';

import Alpine from 'alpinejs';

import Swal from 'sweetalert2';

import flatpickr from 'flatpickr';

//import moment from 'moment';

window.Alpine = Alpine;

Alpine.start();

// Funciones propias js
window.initDatatable = initDatatable;
window.resetForm = resetForm;
window.eliminar = eliminar;
window.showEdit = showEdit;
window.crearEditar = crearEditar;
window.Swal = Swal;
window.flatpickr = flatpickr;
//window.moment = moment;
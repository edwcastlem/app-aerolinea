import './bootstrap';

import { initDatatable, resetForm, crearEditar, showEdit, eliminar, cargarSelect } from './micrud';

import Alpine from 'alpinejs';

import Swal from 'sweetalert2';

// No es nceesario importar al window
import flatpickr from 'flatpickr';
import { Spanish } from 'flatpickr/dist/l10n/es.js';

import moment from 'moment';

window.Alpine = Alpine;

Alpine.start();

// Funciones propias js
window.initDatatable = initDatatable;
window.resetForm = resetForm;
window.eliminar = eliminar;
window.showEdit = showEdit;
window.crearEditar = crearEditar;
window.cargarSelect = cargarSelect;
window.Swal = Swal;
//window.flatpickr = flatpickr;

window.moment = moment;
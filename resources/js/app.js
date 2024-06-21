import './bootstrap';

import { initDatatable, resetForm } from './inicializarDatatables';

import Swal from 'sweetalert2';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.initDatatable = initDatatable;
window.resetForm = resetForm;
window.Swal = Swal;

Alpine.start();
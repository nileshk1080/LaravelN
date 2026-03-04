import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'datatables.net';
import 'datatables.net-dt';


$(document).ready(function () {

    if ($('#myTable').length) {
        $('#myTable').DataTable({
            "searching": false
        });
    }
});






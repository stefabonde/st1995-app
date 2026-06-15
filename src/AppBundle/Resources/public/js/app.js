$(document).ready(function () {
    $('.datatable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Italian.json'
        }
    });

    $('select.select2').select2();
});
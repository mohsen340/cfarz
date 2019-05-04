var tableMain = $('#data-table').DataTable({
    "paging":   false,
    "bFilter": false,
    "columnDefs": [{
        "targets":2,
        "orderable":true,
    }],
    "pageLength": 100,
    dom: 'Bfrtip',
    buttons: [
        'selectAll',
        'selectNone'
    ],
});

$(window).on( 'resize', function () {
    $('#data-table').css("width", "100%");
} );
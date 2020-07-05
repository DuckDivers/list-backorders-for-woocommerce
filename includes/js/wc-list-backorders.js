(function( $ ) {
	'use strict';
	var table =  $('#report').DataTable({
    "pageLength": 25,
    dom: '<f><"dt-options"<"export-buttons"B>l>rtip',
    "order": [ 0, 'desc' ],
    "language": {
        "search": "Search by any field:",
        "searchPlaceholder": "Search"
    },
    buttons: [{
            extend: 'copy',
            text: 'Copy to clipboard'
        },
        { 
            extend: 'excel',
            title: dd_backorders.report_title
        },
        { 
            extend: 'pdf',
            title: dd_backorders.report_title
        },
        {   
            extend: 'csv',
            title: dd_backorders.report_title
        },
        ],
        rowGroup: {
            dataSrc: '',
        },
    });
    
    // Change the fixed ordering when the data source is updated
    table.on( 'rowgroup-datasrc', function ( e, dt, val ) {
        table.order.fixed( {pre: [[ val, 'asc' ]]} ).draw();
    } );
 
    $('a.group-by').on( 'click', function (e) {
        e.preventDefault();
 
        table.rowGroup().dataSrc( $(this).data('column') );
        $('a.group-by.active').removeClass('active');
        $(this).addClass('active');
    } );
    
    $(".export-buttons .dt-buttons").before('<span class="export-label">Export the current view / report: </span>');

})( jQuery );
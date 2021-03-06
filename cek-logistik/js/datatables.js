//script datatables
$(document).ready(function() {
  var table = $('#tabel-print').DataTable( {
      lengthChange: false,
      buttons: [ 
          {
              extend: 'print',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
              }
          },
          {
              extend: 'excel',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
              }
          },
          {
              extend: 'pdf',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
              }
          },
      ]
  } );

  table.buttons().container()
      .appendTo( '#tabel-print_wrapper .col-md-6:eq(0)' );
} );
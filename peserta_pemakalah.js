$(document).ready( function () 
    {
      $('#table_pemakalah').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
        "ajax": {
          "url": "data_pemakalah.php",
          "type": "POST"
        },
       "columnDefs":[
      {
        "targets":[3,4],
        "orderable":false,
      },
    ],
        "columns": [
        { "data": "author1" },
        { "data": "judul_abs" },
        { "data": "kategori" },
        { "data": "btnabstrak" },
        { "data": "btnpaper" },
        ]
      });
    });
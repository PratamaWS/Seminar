$(document).ready( function () 
    {
      $('#tabel_nonpemakalah').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
        "ajax": {
          "url": "data_nonpemakalah.php",
          "type": "POST"
        },
       "columnDefs":[
      {
        "targets":[],
        "orderable":false,
      },
    ],
        "columns": [
        { "data": "nama_lengkap" },
        { "data": "instansi" },
        ]
      });
    });
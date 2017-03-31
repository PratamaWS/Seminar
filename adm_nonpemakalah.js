$(document).ready( function () 
    {
      $('#table_nonpemakalah').DataTable({
        "scrollX": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
        "ajax": {
          "url": "data_admnonpemakalah.php",
          "type": "POST"
        },
       "columnDefs":[
      {
        "targets":[0],
        "orderable":false,
      },
    ],
        "columns": [
        { "data": "btnhps" },
         { "data": "status_bayar" },
        { "data": "nama_lengkap" },
        { "data": "instansi" },
        { "data": "alamat" },
        { "data": "no_hp" },
        { "data": "email" },
        ]
      });
    });

$(document).on( "click",".btnhapus", function() {
      var id_np= $(this).attr("id_np");
      var nama_lengkap = $(this).attr("nama_lengkap");
      swal({   
        title: "Delete Data?",   
        text: "Delete Data : "+nama_lengkap+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Delete",   
        closeOnConfirm: true }, 
        function(){   
          var value = {
            id_np: id_np
          };
          $.ajax(
          {
            url : "delete_nonpemakalah.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify('Successfull delete data');
                var table = $('#table_nonpemakalah').DataTable(); 
                table.ajax.reload( null, false );
              }else{
                swal("Error","Can't delete data, error : "+data.error,"error");
              }

            },
            error: function(jqXHR, textStatus, errorThrown)
            {
             swal("Error!", textStatus, "error");
            }
          });
        });
    });
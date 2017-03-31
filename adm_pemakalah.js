$(document).ready( function () 
    {
      $('#table_pemakalah').DataTable({
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
          "url": "data_admpemakalah.php",
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
        { "data": "status_lolos" },
        { "data": "status_bayar" },
        { "data": "status_mak" },
        { "data": "judul_abs" },
        { "data": "kategori" },
        { "data": "author1" },
        { "data": "author2" },
        { "data": "author3" },
       { "data": "author4" },
       { "data": "author5" },
       { "data": "author1abs" },
        { "data": "author2abs" },
        { "data": "author3abs" },
       { "data": "author4abs" },
       { "data": "author5abs" },
        ]
      });
    });

$(document).on( "click",".btnhapus", function() {
      var id_data = $(this).attr("id_data");
      var judul_abs = $(this).attr("judul_abs");
      swal({   
        title: "Delete Data?",   
        text: "Delete Data : "+judul_abs+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Delete",   
        closeOnConfirm: true }, 
        function(){   
          var value = {
            id_data: id_data
          };
          $.ajax(
          {
            url : "delete_pemakalah.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify('Successfull delete data');
                var table = $('#table_pemakalah').DataTable(); 
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
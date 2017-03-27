$(document).ready( function () 
    {
      $('#table_bayar').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,

        "ajax": {
          "url": "datapembayaran.php",
          "type": "POST"
        },
        "columns": [
        { "data": "user" },
        { "data": "judul_abs" },
        { "data": "status_bayar"},
       /* { "data": "status_bayar" },*/
        { "data": "download" , "orderable": false},
        { "data": "cekbayar" , "orderable": false},
        ]
      });
    });
   $(document).on("change", '.btnedit', function (){
          var $this = $(this);
          var id_data = $this.attr("id_data");
          var status_bayar = $this.attr("status_bayar");
          $.ajax({
             url: 'proses_bayar.php',
             type: 'post',
             data: {
                id_data: id_data, 
                status_bayar: status_bayar
             },
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify("Status Pembayaran berubah ke Sudah","success");
                var table = $('#table_bayar').DataTable(); 
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
      $.notifyDefaults({
      type: 'success',
      delay: 1000
    });
    });
   
            
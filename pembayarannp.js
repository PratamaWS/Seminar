$(document).ready( function () 
    {
      $('#table_bayarnp').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,

        "ajax": {
          "url": "datapembayarannp.php",
          "type": "POST"
        },
        "columns": [
        { "data": "username" },
        { "data": "nama_lengkap" },
        { "data": "instansi" },
        { "data": "no_hp" },
        { "data": "status_bayar"},
       /* { "data": "status_bayar" },*/
        { "data": "download" , "orderable": false},
        { "data": "cekbayar" , "orderable": false},
        ]
      });
    });
   $(document).on("change", '.btnedit', function (){
          var $this = $(this);
          var username = $this.attr("username");
          var status_bayar = $this.attr("status_bayar");
          swal({   
          title: "Konfirmasi Pembayaran?",   
          text: "Konfirmasi pembayaran milik : "+username+" ?",   
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#10a98b",   
          confirmButtonText: "Konfirmasi",   
          closeOnConfirm: true }, 
          function(){   
             $.ajax({
             url: 'proses_bayarnp.php',
             type: 'post',
             data: {
                username: username, 
                status_bayar: status_bayar
             },
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify("Status Pembayaran berubah ke Sudah","success");
                var table = $('#table_bayarnp').DataTable(); 
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

      $.notifyDefaults({
      type: 'success',
      delay: 1000
    });
    });
   
            
$(document).ready( function (){
  $('#table_abs').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "responsive": true,
    "autoWidth": false,
    "pageLength": 10,

    "ajax": {
      "url": "dataabs.php",
      "type": "POST"
    },
    "columns": [
    { "data": "judul_abs" },
    { "data": "user" },
    { "data": "status_lolos"},
   /* { "data": "status_bayar" },*/
    { "data": "download" , "orderable": false},
    { "data": "ceklolos" , "orderable": false},
    ]
  });
});

$(document).on("change", '.btnedit', function (){
  var $this = $(this);
  var id_data = $this.attr("id_data");
  var judul_abs = $this.attr("judul_abs");
  var status_lolos = $this.attr("status_lolos");
  swal({   
    title: "Loloskan Abstrak?",   
    text: "Loloskan abstrak : "+judul_abs+" ?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#10a98b",   
    confirmButtonText: "Loloskan",   
    closeOnConfirm: true }, 
    function(){   
      $.ajax({
         url: 'proses_lolos.php',
         type: 'post',
         data: {
            id_data: id_data, 
            status_lolos: status_lolos
         },
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          if(data.result ==1){
            $.notify("Status abstrak berubah ke lolos","success");
            var table = $('#table_abs').DataTable(); 
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
   
            
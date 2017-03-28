$(document).ready( function (){
  $('#table_mak').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "responsive": true,
    "autoWidth": false,
    "pageLength": 10,

    "ajax": {
      "url": "datamak.php",
      "type": "POST"
    },
    "columns": [
    { "data": "user" },
   /* { "data": "status_bayar" },*/
    { "data": "download" , "orderable": false},
    { "data": "cekmenang" , "orderable": false},
    ]
  });
});

$(document).on("change", '.btnedit', function (){
  var $this = $(this);
  var id_data = $this.attr("id_data");
  var status_mak = $this.attr("status_mak");
  $.ajax({
     url: 'proses_menang.php',
     type: 'post',
     data: {
        id_data: id_data, 
        status_mak: status_mak
     },
    success: function(data, textStatus, jqXHR)
    {
      var data = jQuery.parseJSON(data);
      if(data.result ==1){
        $.notify("Status Makalah berubah ke Menang","success");
        var table = $('#table_mak').DataTable(); 
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
   
            
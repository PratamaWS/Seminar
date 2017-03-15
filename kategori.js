$(document).ready( function () 
    {
      $('#table_brt').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
        "ajax": {
          "url": "data.php",
          "type": "POST"
        },
        "columns": [
        { "data": "urutan" },
        { "data": "berita_judul" },
        { "data": "berita_isi" },
        { "data": "berita_tanggal" },
        { "data": "button" },
        ]
      });


    });
    $(document).on("click","#btnadd",function(){
        $("#modalbrt").modal("show");
        $("#txtjudul").focus();
        $("#txtjudul").val("");
        $("#txtisi").val("");
        $("#txttgl").val("");
        $("#crudmethod").val("N");
        $("#txtid").val("0");
    });
     $(document).on( "click",".btnhapus", function() {
      var berita_id = $(this).attr("berita_id");
      var berita_judul = $(this).attr("berita_judul");
      swal({   
        title: "Delete Data?",   
        text: "Delete Data : "+berita_judul+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Delete",   
        closeOnConfirm: true }, 
        function(){   
          var value = {
            berita_id: berita_id
          };
          $.ajax(
          {
            url : "delete_berita.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify('Successfull delete data');
                var table = $('#table_brt').DataTable(); 
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
    $(document).on("click","#btnsave",function(){
      var berita_id = $("#txtid").val();
      var berita_judul = $("#txtjudul").val();
      var berita_isi = $("#txtisi").val();
      var berita_tanggal = $("#txttgl").val();
      var crud=$("#crudmethod").val();
      if(berita_judul == '' || berita_judul == null ){
        swal("Warning","Isi judul berita","warning");
        $("#txtjudul").focus();
        return;
      }
      var value = {
        berita_id: berita_id,
        berita_judul: berita_judul,
        berita_isi:berita_isi,
        berita_tanggal:berita_tanggal,
        crud:crud
      };
      $.ajax(
      {
        url : "save_berita.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          if(data.crud == 'N'){
            if(data.result == 1){
              $.notify('Sukses menyimpan data');
              var table = $('#table_brt').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtjudul").focus();
              $("#txtjudul").val("");
              $("#txtisi").val("");
              $("#txttgl").val("");
              $("#crudmethod").val("N");
              $("#txtid").val("0");
              $("#txtjudul").focus();
            }else{
              swal("Error","Tidak bisa menyimpan berita, error : "+data.error,"error");
            }
          }else if(data.crud == 'E'){
            if(data.result == 1){
              $.notify('Successfull update data');
              var table = $('#table_brt').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtname").focus();
            }else{
             swal("Error","Tidak bisa update berita, : "+data.error,"error");
            }
          }else{
            swal("Error","invalid order","error");
          }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
           swal("Error!", textStatus, "error");
        }
      });
    });
    $(document).on("click",".btnedit",function(){
      var berita_id=$(this).attr("berita_id");
      var value = {
        berita_id: berita_id
      };
      $.ajax(
      {
        url : "get_berita.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          $("#crudmethod").val("E");
          $("#txtid").val(data.berita_id);
          $("#txtjudul").val(data.berita_judul);
          $("#txtisi").val(data.berita_isi);
          $("#txttgl").val(data.berita_tanggal);

          $("#modalbrt").modal('show');
          $("#txtname").focus();
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
$(document).ready( function () 
    {
      $('#table_kategori').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
        "ajax": {
          "url": "data_kategori.php",
          "type": "POST"
        },
        "columns": [
        { "data": "urutan" },
        { "data": "kategori_nama" },
        { "data": "button" },
        ]
      });


    });
    $(document).on("click","#btnadd",function(){
        $("#modalkategori").modal("show");
        $("#txtjudul").focus();
        $("#txtjudul").val("");
        $("#txtisi").val("");
        $("#txttgl").val("");
        $("#crudmethod").val("N");
        $("#txtid").val("0");
    });
     $(document).on( "click",".btnhapus", function() {
      var kategori_id = $(this).attr("kategori_id");
      var kategori_nama = $(this).attr("kategori_nama");
      swal({   
        title: "Delete Data?",   
        text: "Delete Data : "+kategori_nama+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Delete",   
        closeOnConfirm: true }, 
        function(){   
          var value = {
            kategori_id: kategori_id
          };
          $.ajax(
          {
            url : "delete_kategori.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify('Successfull delete data');
                var table = $('#table_kategori').DataTable(); 
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
      var kategori_id = $("#txtid").val();
      var kategori_nama = $("#txtnama").val();
      var crud=$("#crudmethod").val();
      if(kategori_nama == '' || kategori_nama == null ){
        swal("Warning","Isi nama kategori!","warning");
        $("#txtnama").focus();
        return;
      }
      var value = {
        kategori_id: kategori_id,
        kategori_nama: kategori_nama,
        crud:crud
      };
      $.ajax(
      {
        url : "save_kategori.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          if(data.crud == 'N'){
            if(data.result == 1){
              $.notify('Sukses menambahkan data');
              var table = $('#table_kategori').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtnama").focus();
              $("#txtnama").val("");
              $("#crudmethod").val("N");
              $("#txtid").val("0");
              $("#txtnama").focus();
            }else{
              swal("Error","Tidak bisa menambahkan kategori, error : "+data.error,"error");
            }
          }else if(data.crud == 'E'){
            if(data.result == 1){
              $.notify('Berhasil update kategori');
              var table = $('#table_kategori').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtname").focus();
            }else{
             swal("Error","Tidak bisa update kategori, : "+data.error,"error");
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
      var kategori_id=$(this).attr("kategori_id");
      var value = {
        kategori_id: kategori_id
      };
      $.ajax(
      {
        url : "get_kategori.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          $("#crudmethod").val("E");
          $("#txtid").val(data.kategori_id);
          $("#txtnama").val(data.kategori_nama);

          $("#modalkategori").modal('show');
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
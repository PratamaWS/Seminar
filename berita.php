 <!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION['user'])){
 echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='login.php';</script>";  
}

if(isset($_SESSION['user'])){
   if($_SESSION['role'] == "user"){
     header("location:halaman_user.php");
   }
   if($_SESSION['role'] == "np"){
     header("location:halaman_np.php");
   }
}

IF(ISSET($_SESSION['user'])){
  ?>
  <html>
  <head>     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Berita</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="dist/img/favicon.ico">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skin-blue-light.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

  </head>

  <body class="skin-blue-light fixed sidebar-mini ">
    <div class="wrapper">

      <header class="main-header">
        <a href="berita.php" class="logo">
          <span class="logo-lg"><b>Admin</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="berita.php" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                  <span><?=$_SESSION['user']?></span>
                </a>
              </li>
              <li class="dropdown user user-menu">
                <a href="logout.php?keluar"><i class="fa fa-sign-out"></i> <strong>Logout</strong></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <section class="sidebar">
        </br>
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/images.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
          </br>
          <p>Admin, <?=$_SESSION['user']?></p>
        </div>
      </div>
    </br>
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <li class="active treeview">
        <a href="berita.php">
          <i class="fa fa-bullhorn"></i>
          <span>Kelola Berita</span>
        </a>
      </li>
      <li class="treeview">
        <a href="kategori.php">
          <i class="fa fa-th"></i> <span>Kelola Kategori</span>
        </a>
      </li>
      <li class="treeview">
        <a href="adm_pemakalah.php">
          <i class="fa fa-user"></i> <span>Daftar Peserta</span><i class="fa fa-angle-left pull-right"></i>
        </a>
      </li> 
      <li class="treeview">
        <a href="pembayaran.php">
          <i class="fa fa-money"></i> <span>Kelola Pembayaran</span><i class="fa fa-angle-left pull-right"></i>
        </a>
      </li> 
      <li class="treeview">
        <a href="abstrak.php">
          <i class="fa fa-book"></i> <span>Kelola Data Pemakalah</span><i class="fa fa-angle-left pull-right"></i>
        </a>
      </li> 
    </ul>
  </section>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Berita
    </h1>
  </br>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li class="active">Kelola berita</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary "><i class="fa fa-plus"></i> Tambah Berita</button>
        </div>
      </br>
      <div class="box-body">
        <table id="user_data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="10%">Gambar</th>
              <th width="20%">Judul</th>
              <th width="35%">Isi</th>
              <th width="15%">Tanggal Dibuat</th>
              <th width="10%">Edit</th>
              <th width="10%">Delete</th>
            </tr>
          </thead>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- ./row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer tengah">
  <strong>Copyright &copy; 2017 <a href="">Seminar</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->
<script>
  $(function () {
    $(".textarea").wysihtml5();
  });
</script>
</body>

</html>

<div id="userModal" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
          <label>Judul berita</label>
          <input type="text" name="berita_judul" id="berita_judul" class="form-control " required/>
          <br />
          <label>Isi Berita</label>
          <div class="form-group"> 
            <div class="col-md-12">
              <div class="box-header">
                <div class="box-body pad">
                  <textarea id="berita_isi" type="text"  required name="berita_isi" rows="10" cols="80" class="textarea" placeholder="Tulis isi Berita" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </div>
            </div>
          </div>
          <br />
          <label>Upload gambar (Jika ada)</label>
          <input type="file" name="user_image" id="user_image" />
          <span id="user_uploaded_image"></span>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="berita_id" id="berita_id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript" language="javascript" >
  $(document).ready(function(){
    $('#add_button').click(function(){
      $('#user_form')[0].reset();
      $('.modal-title').text("Form Tambah Berita");
      $('#action').val("Add");
      $('#operation').val("Add");
      $('#user_uploaded_image').html('');
    });

    var dataTable = $('#user_data').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"fetch.php",
        type:"POST"
      },
      "columnDefs":[
      {
        "targets":[0, 4,5],
        "orderable":false,
      },
      ],

    });

    $(document).on('submit', '#user_form', function(event){
      event.preventDefault();
      var beritajudul = $('#berita_judul').val();
      var beritaisi = $('#berita_isi').val();
      var extension = $('#user_image').val().split('.').pop().toLowerCase();
      if(extension != '')
      {
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid Image File");
          $('#user_image').val('');
          return false;
        }
      } 
      if(beritajudul != '' && beritaisi != '')
      {
        $.ajax({
          url:"insert.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            alert(data);
            $('#user_form')[0].reset();
            /*          $('#userModal').modal('hide');*/
            dataTable.ajax.reload();
          }
        });
      }
      else
      {
        alert("Both Fields are Required");
      }
    });

    $(document).on('click', '.update', function(){
      var berita_id = $(this).attr("berita_id");
      $.ajax({
        url:"fetch_single.php",
        method:"POST",
        data:{berita_id:berita_id},
        dataType:"json",
        success:function(data)
        {
          $('#userModal').modal('show');
          $('#berita_judul').val(data.berita_judul);
          $('#berita_isi').val(data.berita_isi);
          $('#berita_tanggal').val(data.berita_tanggal);
          $('.modal-title').text("Edit data berita");
          $('#berita_id').val(berita_id);
          $('#user_uploaded_image').html(data.user_image);
          $('#action').val("Edit");
          $('#operation').val("Edit");
        }
      })
    });

    $(document).on('click', '.delete', function(){
      var berita_id = $(this).attr("berita_id");
      if(confirm("Are you sure you want to delete this?"))
      {
        $.ajax({
          url:"delete_berita.php",
          method:"POST",
          data:{berita_id:berita_id},
          success:function(data)
          {
            dataTable.ajax.reload();
          }
        });
      }
      else
      {
        return false; 
      }
    });

  });
</script>
<?php 
}else{
  echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='login.php';</script>";  
}
?>
<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['alert'])){
    $alert = $_SESSION['alert'];
}
if(isset($_SESSION['alert2'])){
    $alert2 = $_SESSION['alert2'];
}
if(isset($_SESSION['user'])){
   if($_SESSION['role'] == "user"){
     header("location:halaman_user.php");
   }
   if($_SESSION['role'] == "admin"){
     header("location:berita.php");
   }
}
IF(ISSET($_SESSION['user'])){
  ?>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Non Pemakalah</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="dist/img/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="dist/css/skin-blue-light.min.css">

    <!-- SweetAlert  style -->
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">
  </head>
  <body class="skin-blue-light fixed sidebar-mini ">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="halaman_np.php" class="logo">
          <span class="logo-lg"><b>Seminar Nasional</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="halaman_np.php" class="dropdown-toggle" data-toggle="dropdown">
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
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Upload Bukti Pembayaran
    </h1>
  </br>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li class="active">Upload Bukti Pembayaran</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
   <div class="col-xs-2">
   </div>
   <div class="col-xs-8">
     <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Upload Bukti Pembayaran</h3>
      </div><!-- /.box-header -->
      <?php
        if(isset($alert)){
        ?>
        <div class="alert alert-success"><?php echo $alert; ?></div>
        <?php
        }
        if(isset($alert2)){
          ?>
          <div class="alert alert-danger"><?php echo $alert2; ?></div>
          <?php
        }
         unset($_SESSION['alert']);
         unset($_SESSION['alert2']);
      ?>
      <!-- form start -->
      <form role="form" action = "uploadbayarnp.php" method = "post" enctype="multipart/form-data">

        <div class="box-body">
          <div class="form-group">
            <label >Foto Bukti Pembayaran</label>
            <input type="file" name="bayar" required>
            <p class="help-block">*maksimal ukuran foto 5MB</p>
          </div>
        <div class="box-footer">
          <button type="submit" name="uploadbayar" class="btn btn-primary btn-flat">Submit</button>
        </div>
      </form>
    </div> 
  </div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
<div id="modalbrt" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Form Data Berita</h4>
      </div>
      <!--modal header-->
      <div class="modal-body">
        <div class="pad" id="infopanel"></div>
        <div class="form-horizontal">
          <div class="form-group"> 
            <label class="col-sm-2  control-label">Judul</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtjudul" placeholder="Judul">
              <input type="hidden" id="crudmethod" value="N"> 
              <input type="hidden" id="txtid" value="0">
            </div>
          </div>
          <div class="form-group"> 
            <label class="col-sm-2  control-label" >Isi</label>
            <div class="col-sm-9">
              <textarea type="text" class="form-control" placeholder="Isi berita" id="txtisi"></textarea>
            </div>
          </div>
        </br>
        <div class="form-group"> 
          <label class="col-sm-2  control-label"></label>
          <div class="col-sm-9">
            <button type="submit" class="btn btn-primary " id="btnsave"><i class="fa fa-save"></i> Save</button></div>
          </div>
        </div>
        <!--modal footer-->
      </div>
      <!--modal-content-->
    </div>
    <!--modal-dialog modal-lg-->
  </div>
  <!--form-kantor-modal-->
</div>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="container tengah">
    <strong>Copyright © 2017 <a href="index.php">Seminar Nasional Pendidikan Bahasa Indonesia</a></strong> Universitas Muhammadiyah Purworejo
  </div><!-- /.container -->
</footer>
</div><!-- ./wrapper -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script src="plugins/sweetalert/sweetalert.min.js"></script>

<script src="plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
</body>
</html>
<?php 
}else{
  echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='login.php';</script>";  
}
?>

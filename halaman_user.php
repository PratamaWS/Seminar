<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['alert'])){
    $alert = $_SESSION['alert'];
}
IF(ISSET($_SESSION['user'])){
  ?>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard User</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
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
        <a href="index.php" class="logo">
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
                <a class="dropdown-toggle" data-toggle="dropdown">
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
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
        </br>
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/logo.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
          </br>
          <p>Welcome, <?=$_SESSION['user']?></p>
        </div>
      </div>
    </br>
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <li class="active treeview">
        <a href="halaman_user.php">
          <i class="fa fa-files-o"></i> <span>Upload Abstrak</span>
        </a>
      </li>
      <li class="treeview">
        <a href="buktibayar.php">
          <i class="fa fa-money"></i>
          <span>Upload Bukti Pembayaran</span>
        </a>
      </li>
      <li class="treeview">
        <a href="kelolamakalah.php">
          <i class="fa fa-book"></i> <span>Kelola Makalah</span>
        </a>
      </li>
    </ul>
  </section>
</aside>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Upload Abstrak
    </h1>
  </br>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Upload Abstrak</li>
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
        <h3 class="box-title">Form Data Abstrak</h3>
      </div><!-- /.box-header -->
      <?php
       if(isset($alert)){
        ?>
        <div class="alert alert-danger"><?php echo $alert; ?></div>
        <?php
      }
         unset($_SESSION['alert']);
      ?>
      <!-- form start -->
      <form role="form" action = "upload.php" method = "post" enctype="multipart/form-data">

        <div class="box-body">
          <div class="form-group">
            <label >Judul</label>
            <input type="text" class="form-control" name="judul_abs" required placeholder="Judul">
          </div>
          <div class="form-group">
            <label >Abstrak</label>
            <input type="file" name="berkas" required >
            <p class="help-block">*maksimal ukuran abstrak 500Kb</p>
          </div>
          <div class="form-group">
            <label >Keyword</label>
            <input type="text" class="form-control" name="keyword" required  placeholder="Keyword">
          </div>
          <div class="form-group">
           <label>Kategori  </label>
           <!-- <select  class="form-control" name="kategori">  
            <option value="">Silahkan Pilih</option>   -->
            <?php
              include 'connection.php';
              $sql = "SELECT * FROM kategori ORDER BY kategori_nama";
              $resultsql = mysqli_query($conn, $sql);
              echo '<select name="kategori" class="form-control" data-style="btn-default" style="display:block; width:45%;"><option selected="true" disabled="disabled" value="">Silahkan Pilih Kategori</option>';
              while( $row = mysqli_fetch_array($resultsql) ) {
                $kategori = $row['kategori_nama'];
                echo '<option value="'.$kategori.'" >'.$kategori.'</option>';
              }
              echo '</select>';
            ?>
          <!-- </select>   -->
          </div> 

        <div class="form-group">
          <label>Author 1<input type="text" class="form-control"  name="author1" required><input type="radio" name="author1abs" value="hadir" checked="">Hadir<input type="radio" name="author1abs" value="Tidak" required>Tidak</label>
        </div> 
        <div class="form-group">  
          <label>Author 2<input type="text" class="form-control" name="author2" required=""><input type="radio" name="author2abs" value="hadir" checked="checked">Hadir<input type="radio" name="author2abs" value="Tidak">Tidak</label>
        </div> 
        <div class="form-group">.
          <label>Author 3<input type="text" class="form-control" name="author3"><input type="radio" name="author3abs" value="hadir">Hadir<input type="radio" name="author3abs" value="Tidak" checked="checked">Tidak</label>      
        </div>  

        <div class="form-group">
          <label>Author 4<input type="text" class="form-control" name="author4"><input type="radio" name="author4abs" value="hadir">Hadir<input type="radio" name="author4abs" value="Tidak" checked="checked">Tidak</label>
        </div>
        <div class="form-group">
          <label>Author 5<input type="text"  class="form-control" name="author5"><input type="radio" name="author5abs" value="hadir">Hadir<input type="radio" name="author5abs" value="Tidak" checked="checked">Tidak</label>
        </div>

        <div class="box-footer">
          <button type="submit" name="upload" class="btn btn-primary btn-flat">Submit</button>
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

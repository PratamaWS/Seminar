<!DOCTYPE html>
<?php 
session_start();
IF(ISSET($_SESSION['user'])){
  ?>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelola Pembayaran</title>
     <link rel="shortcut icon" href="dist/img/favicon.ico">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="dist/css/skin-blue-light.min.css">
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">
  </head>
  <body class="skin-blue-light fixed sidebar-mini ">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <span class="logo-lg"><b>Admin</b></span>
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
        <li class="treeview">
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
              <a href="#">
                <i class="fa fa-user"></i> <span>Daftar Peserta</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="adm_pemakalah.php"><i class="fa fa-circle-o"></i> Pemakalah</a></li>
                <li><a href="adm_nonpemakalah.php"><i class="fa fa-circle-o"></i> Non Pemakalah</a></li>
              </ul>
            </li> 

          <li class="active treeview">
              <a href="#">
                <i class="fa fa-money"></i> <span>Kelola Pembayaran</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li ><a href="pembayaran.php"><i class="fa fa-circle-o"></i> Pemakalah</a></li>
                <li class="active"><a href="pembayarannp.php"><i class="fa fa-circle-o"></i> Non Pemakalah</a></li>
              </ul>
            </li>
                  <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Kelola Data Pemakalah</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="abstrak.php"><i class="fa fa-circle-o"></i> Konfirmasi Abstrak</a></li>
                <li><a href="makalah.php"><i class="fa fa-circle-o"></i> Konfirmasi Makalah</a></li>
              </ul>
            </li>
    </ul>
  </section>
</aside>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Pembayaran
    </h1>
  </br>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Kelola Pembayaran</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
      </br>
      <div class="box-body">
        <table id="table_bayarnp" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:20%">Username</th>
              <th style="width:20%">Nama Lengkap</th>
              <th style="width:20%">Instansi</th>
              <th style="width:20%">Nomor HP</th>
              <th style="width:15%">Status Bayar</th>
              <!--                        <th style="width:15%">Status Bayar</th> -->
              <th style="width:8%">File</th>
              <th style="width:8%">Bayar </th>
            </th>
          </tr>
        </thead>
      </table>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
       <footer class="main-footer tengah">
        <strong>Copyright &copy; 2017 <a href="">Seminar</a>.</strong> All rights reserved.
      </footer>
</div><!-- ./wrapper -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>

<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>

<script src="plugins/sweetalert/sweetalert.min.js"></script>

<script src="pembayarannp.js"></script>

<script src="plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
</body>
</html>
<?php 
}else{
  echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='login.php';</script>";  
}
?>

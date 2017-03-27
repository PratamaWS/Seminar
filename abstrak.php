<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION['user'])){
 echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='login.php';</script>";  
}

if($_SESSION['role'] == "user"){
  header("location:halaman_user.php");
}

IF(ISSET($_SESSION['user'])){
?>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelola Abstrak</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skin-blue-light.min.css">
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">
  </head>
  <body class="skin-blue-light fixed sidebar-mini ">
    <div class="wrapper">
      <header class="main-header">
        <a href="index.php" class="logo">
          <span class="logo-lg"><b>Admin</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
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
            <li class="treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i><span>Dashboard</span>
              </a>
            </li>
            <li class="active treeview">
              <a href="abstrak.php">
                <i class="fa fa-files-o"></i>
                <span>Kelola Abstrak</span>
              </a>
            </li>
            <li>
              <a href="pembayaran.php">
                <i class="fa fa-money"></i> <span>Kelola Pembayaran</span>
              </a>
            </li>
            <li class="treeview">
              <a href="kategori.php">
                <i class="fa fa-th"></i> <span>Kelola Kategori</span>
              </a>
            </li>
            <li class="treeview">
              <a href="berita.php">
                <i class="fa fa-bullhorn"></i>
                <span>Berita</span>
              </a>
            </li>
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Data Abstrak
          </h1>
        </br>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Kelola Abstrak</li>
        </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                </br>
                <div class="box-body">
                  <table id="table_abs" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:20%">Judul</th>
                        <th style="width:20%">User</th>                 
                        <th style="width:15%">Status Lolos</th>
                        <th style="width:8%">File</th>
                        <th style="width:8%">Loloskan </th>
                      </tr>
                    </thead>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2017 <a href="">Seminar</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="abstrak.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
  </body>
</html>
<?php 
}else{
  echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='login.php';</script>";  
}
?>

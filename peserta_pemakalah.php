<?php
session_start();
if(isset($_SESSION['user'])){
  if($_SESSION['role'] == "admin"){
   header("location:homeadmin.php");
 }
 if($_SESSION['role'] == "user"){
   header("location:halaman_user.php");
 }
}
require('connection.php');
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peserta Pemakalah</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="shortcut icon" href="dist/img/favicon.ico">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/skin-blue-light.min.css">
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
</head>
<body class="skin-blue-light fixed layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <!--               <a href="index.html" class="navbar-brand-img">  <img src="dist/img/logo.png" alt="User Image" width="50px" ></a> -->
            <a href="index.php" class="navbar-brand "><b>Seminar Nasional </b>Pendidikan Bahasa Indonesia
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
           <a href="index.php" class="navbar-brand"></a>
          <ul class="nav navbar-nav">
            <li class=""><a href="index.php"><b>Home </b><span class="sr-only">(current)</span><i class="fa fa-home"></i></a></li>
             <li class="active dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Peserta <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="peserta_pemakalah.php">Pemakalah</a></li>
                <li><a href="peserta_nonpemakalah.php">Non Pemakalah</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="login.php">Login</a></li>
                <li><a href="halaman_register.php">Register Pemakalah</a></li>
                <li><a href="daftar_np.php">Register Non Pemakalah</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper" style="min-height: 318px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-body">
              <div class="carousel-inner">
                <div class="item active">
                  <img src="dist/img/1.png" alt="Header image">
                </div>
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="box box-solid">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-8">
        
                  <div class="box box-widget">
                  <div class='box-header with-border bg-gray disabled color-palette tengah'>
               <h4>Data Pemakalah Seminar Nasional </h4>
                  </div>
                   </br>
                          <table id="table_pemakalah" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="20%">Nama</th>
              <th width="20%">Judul</th>
              <th width="20%">Kategori</th>
              <th width="10%">Abstrak</th>
              <th width="10%">Paper</th>

            </tr>
          </thead>
        </table>
                </div><!-- /.box -->
               <div class="box-footer clearfix">
            <div class="row">
            </div>
          </div>
        </div><!-- /.col -->
        <div class="col-md-4">
              <div class="box box-purple">
                <div class="box-header with-border">
                  <h3 class="box-title">ACCOUNT</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                  <div class="box-body">
                  <a href="login.php"class="btn btn-block btn-social btn-github btn-flat">
                    <i class="fa fa-user"></i> LOGIN
                  </a>
                  <a href="halaman_register.php"class="btn btn-block btn-social btn-primary btn-flat">
                    <i class="fa fa-plus"></i> REGISTER PEMAKALAH
                  </a>
                   <a href="daftar_np.php"class="btn btn-block btn-social btn-default btn-flat">
                    <i class="fa fa-plus"></i> REGISTER NON PEMAKALAH
                  </a>
                  <br>
                </div>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
                       <div class="box box-purple">
          <div class="box-header with-border">
            <h3 class="box-title">DAFTAR PESERTA</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal">
            <div class="box-body">
             <h4> <a href="peserta_pemakalah.php"class=""><i class="glyphicon glyphicon-arrow-right"></i>      Pemakalah</h4>
              </a>
              <h4> <a href="peserta_nonpemakalah.php"class=""><i class="glyphicon glyphicon-arrow-right"></i>      Non Pemakalah</h4>
              </a>
              </div>
          </form>
        </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div><!-- /.row -->
          </div><!-- /.row -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
             <footer class="main-footer">
        <div class="container tengah">
          <strong>Copyright © 2017 <a href="index.php">Seminar Nasional Pendidikan Bahasa Indonesia</a></strong> Universitas Muhammadiyah Purworejo
        </div><!-- /.container -->
      </footer>
      </footer>
    </div><!-- ./wrapper -->

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
   <script src="peserta_pemakalah.js"></script>
</body>
</html>

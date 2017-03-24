<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Detail Berita</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skin-blue-light.min.css">
</head>
  <body class="skin-blue-light fixed layout-top-nav">
    <div class="wrapper">
      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="index.php" class="navbar-brand"></a>
              <a href="index.php" class="navbar-brand "><b>Seminar Nasional </b>Pendidikan Bahasa Indonesia</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
              <a href="index.php" class="navbar-brand"></a>
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php"><b>Home </b><span class="sr-only">(current)</span><i class="fa fa-home"></i></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
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
  						  <?php
    							require 'connection.php';
    							$ambil_data = mysqli_query($conn, "SELECT * FROM berita WHERE berita_id = '$_GET[id]'");
    							$hasil_data = mysqli_fetch_array($ambil_data);

    							$judul_berita  = $hasil_data['berita_judul'];
    							$isi_berita    = $hasil_data['berita_isi'];
    							$tgl    		= $hasil_data['berita_tanggal'];
  							?>  
                <div class="box box-widget">
                  <div class='box-header with-border bg-gray disabled color-palette'>
                      <h3><?php echo ($judul_berita);?></h3> 
                  </div>
                  <div class='box-header with-border bg-grey disabled color-palette'>
                    <span class='description '>Post by Admin  on <i class="fa fa-calendar"></i><b> <?=$hasil_data['berita_tanggal'];?></b>
                    </span>
                  </div>
                  <div class='box-body kirikanan'>
                 		<p>					
    									<?php echo ($isi_berita);?>
                    </p>
                    </br>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
              <div class="col-md-4">
                <div class="box box-purple">
                  <div class="box-header with-border">
                    <h3 class="box-title">MASUK AKUN</h3>
                  </div>
                  <form class="form-horizontal">
                    <div class="box-body">
                      <div class="box-body">
                        <a href="login.php"class="btn btn-block btn-social btn-github btn-flat">
                          <i class="fa fa-user"></i> LOGIN
                        </a>
                        <a href="halaman_register.php"class="btn btn-block btn-social btn-primary btn-flat">
                          <i class="fa fa-plus"></i> REGISTER
                        </a>
                        <br>
                      </div>
                    </div><!-- /.box-body -->
                  </form>
                </div><!-- /.box -->
              </div><!--/.col (right) -->
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

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

</body>
</html>
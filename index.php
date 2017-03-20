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
    <title>Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="dist/css/skin-blue-light.min.css">

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
             <a href="index.html" class="navbar-brand"></a>
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
                     <?php
            $sql = "SELECT * FROM berita ORDER BY berita_id DESC";
            $resultsql = mysqli_query($conn, $sql);
            /*$no = 1+$posisi;*/
            $jumlah = mysqli_num_rows($resultsql);
            if ($jumlah<1) {
              ?>
              <p>Berita tidak ditemukan</p>
              <?php
            }
              if ($jumlah>0) {
                  while ($row = mysqli_fetch_assoc($resultsql)) {
                    $judul  = $row['berita_judul'];
                    $isi    = $row['berita_isi'];
                    $tanggal= $row['berita_tanggal'];
                    ?>
              <div class="box box-widget">
                <div class='box-header with-border bg-gray disabled color-palette'>
                    <h3><?=$row['berita_judul'];?></h3> 
                  </div>
                   <div class='box-header with-border bg-grey disabled color-palette'>
                    <span class='description '>Post by Admin  on  <i class="fa fa-calendar"></i><b>  <?=$row['berita_tanggal'];?></b> </span></div>
                <div class='box-body kirikanan'>
                  <!-- post text -->
                  <p><?=substr($row['berita_isi'],0,300);?></p>
                  <!-- Attachment -->
                  <div class="attachment-block clearfix">
                    <!-- <img class="attachment-img" src="<?=$hasil_data['gambar'];?>" alt="image"> -->
                    <div class="attachment-pushed">
                    </div><!-- /.attachment-pushed -->
                  </div><!-- /.attachment-block -->
                </br>
                <a class="btn btn-primary btn-flat btn-sm" href="halaman_readmore.php?&id=<?=$row['berita_id'];?>">Read more</a>  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            <?php  
              }
                }
                ?>  <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
            </div><!-- /.col -->
             <div class="col-md-4">
               <div class="box box-purple">
                <div class="box-header with-border">
                  <h3 class="box-title">SEARCH</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                  <div class="box-body"> 
                          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
              </form>
                  <br>
                </div>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->

              <div class="box box-purple">
                <div class="box-header with-border">
                  <h3 class="box-title">MASUK AKUN</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
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
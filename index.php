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
  <?php
    include 'pagination2.php';
//        pagination config start
    $q = isset($_REQUEST['q']) ? urldecode($_REQUEST['q']) : ''; // untuk keyword pencarian
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // untuk nomor halaman
    $adjacents = isset($_GET['adjacents']) ? intval($_GET['adjacents']) : 3; // khusus style pagination 2 dan 3
    $rpp = 4; // jumlah record per halaman

    $db_link = mysqli_connect('localhost', 'root', '', 'seminar'); // sesuaikan username dan password mysqli anda
    $sql = "SELECT * FROM berita WHERE berita_judul LIKE '%$q%' ORDER BY berita_judul"; // query silahkan disesuaikan
    $result = mysqli_query($db_link, $sql); // eksekusi query

    $tcount = mysqli_num_rows($result); // jumlah total baris
    $tpages = isset($tcount) ? ceil($tcount / $rpp) : 1; // jumlah total halaman
    $count = 0; // untuk paginasi
    $i = ($page - 1) * $rpp; // batas paginasi
    $no_urut = ($page - 1) * $rpp; // nomor urut
    $reload = $_SERVER['PHP_SELF'] . "?q=" . $q . "&amp;adjacents=" . $adjacents; // untuk link ke halaman lain
//        pagination config end
  ?>
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
             $sql = "SELECT * FROM berita WHERE berita_judul LIKE '%$q%' ORDER BY berita_judul";;
             $resultsql = mysqli_query($conn, $sql);
             /*$no = 1+$posisi;*/
             $jumlah = mysqli_num_rows($resultsql);
             if ($jumlah<1) {
              ?>
              <h3>Berita tidak ditemukan</h3>
              <?php
            }
            if ($jumlah>0) {
              while (($count < $rpp) && ($i < $tcount)) {
                  mysqli_data_seek($result, $i);
                  $data = mysqli_fetch_array($result);
                  $judul  = $data['berita_judul'];
                  $isi    = $data['berita_isi'];
                  $tanggal= $data['berita_tanggal'];
                  ?>
                  <div class="box box-widget">
                  <div class='box-header with-border bg-gray disabled color-palette'>
                    <h3><?=$data['berita_judul'];?></h3> 
                  </div>
                  <div class='box-header with-border bg-grey disabled color-palette'>
                    <span class='description '>Post by Admin  on  <i class="fa fa-calendar"></i><b>  <?=$data['berita_tanggal'];?></b> </span></div>
                    <div class='box-body kirikanan'>
                      <!-- post text -->
                      <p><?=substr($data['berita_isi'],0,300);?></p>
                      <!-- Attachment -->
                      <div class="attachment-block clearfix">
                        <!-- <img class="attachment-img" src="<?=$hasil_data['gambar'];?>" alt="image"> -->
                        <div class="attachment-pushed">
                        </div><!-- /.attachment-pushed -->
                      </div><!-- /.attachment-block -->
                    </br>
                    <a class="btn btn-primary btn-flat btn-sm" href="halaman_readmore.php?&id=<?=$data['berita_id'];?>">Read more</a>  
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
                  <?php
                  $i++;
                  $count++;
              }
            }
            ?>  <div class="box-footer clearfix">
            <div class="row">
                <div class="col-md-12">                   
                    <?php echo paginate_two($reload, $page, $tpages, $adjacents); ?>
                </div>
            </div>
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
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Judul Berita..." name="q" value="<?php echo $q ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a class="btn btn-default" href="<?php echo $_SERVER['PHP_SELF'] ?>">Reset</a>
                                    <?php
                                }
                                ?>
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
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
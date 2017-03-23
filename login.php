<?php
require('connection.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login User</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
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
              <a href="index.php" class="navbar-brand logo2"><img src="dist/img/logo.png" alt="Header image" width="45px" >
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
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Login User
            </h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Login form</li>
            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-default">
              <div class="box-body">
              </br>
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                       <?php
              if(isset($pesan)){
                ?>
                <div class="alert alert-danger">Username atau Password Salah!</div>
                <?php
              }
              ?>
          <form action="" method="POST">
      <h2><b>LOGIN </b></h2>
      <hr class="colorgraph">
      <div class="form-group has-feedback">
         <input type="text" class="form-control input-lg" name="username" id="username" required placeholder="Username" tabindex="4"/>
          <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control input-lg" id="password" name="password" required ="Password" placeholder="Password">
         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4 col-sm-3 col-md-3">
          <!-- span class="button-checkbox">
            <button type="button" class="btn" data-color="info" tabindex="7">Remember me</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
          </span> -->
        </div>
      </div>
      <hr class="colorgraph">
      <div class="row"> 
        <div class="col-xs-12 col-md-6"><input type="submit" value="Login" name="login"  class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
        <div class="col-xs-12 col-md-6">Belum punya akun ? <a href="halaman_register.php">Register</a></div>
      </div>
    </form>
  </br>
  </br>
  </br>
  </br>
  </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
       <footer class="main-footer">
        <div class="container tengah">
          <strong>Copyright © 2017 <a href="index.php">Seminar Nasional Pendidikan Bahasa Indonesia</a></strong> Universitas Muhammadiyah Purworejo
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
</body>
<?php
include "koneksi.php";
IF(ISSET($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $cek = mysql_num_rows(mysql_query("SELECT * FROM user WHERE user_name='$username' AND user_password='$password'"));
  $data = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE user_name='$username' AND user_password='$password'"));
  IF($cek > 0)
  {
    session_start();
    $user= $data['user_name'];
    $_SESSION['user'] = $user;
    $sql = "SELECT user_status FROM user WHERE user_name = '$user' ";
    $resultsql = mysql_query( $sql);
    $result = mysql_fetch_assoc($resultsql);
    if($result['user_status'] == 1){      
      $_SESSION['role'] = "admin";
      echo "<script language=\"javascript\">alert(\"Selamat Datang\");document.location.href='homeadmin.php';</script>";
    } else if($result['user_status'] == 2){     
      $_SESSION['role'] = "user";
      header("location:halaman_user.php");
    }
  }else{
    echo "<script language=\"javascript\">alert(\"Password atau Username Salah !!!\");document.location.href='login.php';</script>";
  }
}
?>


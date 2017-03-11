<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="dist/css/skin-blue.min.css">

  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="login.php"><b>LOGIN</b></a>
      </br>
      </br>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      </br>
        <p class="login-box-msg">Silakan Login</p>
      </br>
        <form action="" method="POST">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" id="username" required placeholder="Username"/>
            <span class="fa fa-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" id="password" required placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
         </br>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat" value="Login" name="login" name="login">LOGIN</button>
           </br>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </body>
</html>
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

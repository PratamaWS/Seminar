<?php
require('connection.php');

if(isset($_POST['login'])){
	$user = $_POST['username'];
	$pass = $_POST['password'];

		//SQL Cek Username
	$sql = "SELECT * FROM user WHERE user_name = '$user' AND user_password = '$pass' ";
	$resultsql = mysqli_query($conn, $sql);
	$jumlah = mysqli_num_rows($resultsql);

		//Cek Ketersediaan Username
	if($jumlah > 0){
		$_SESSION['user'] = $user;			
		$sql = "SELECT user_status FROM user WHERE user_name = '$user' ";
		$resultsql = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($resultsql);
		if($result['user_status'] == 1){			
			$_SESSION['role'] = "admin";
			header("location:halaman_admin.php");
		} else if($result['user_status'] == 2){			
			$_SESSION['role'] = "user";
			header("location:halaman_user.php");
		} else {
			echo "Gagal";
		}
	} else {
		$pesan = 1;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Seminar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container" style="margin-top: 5%;">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form method="post" action="halaman_login.php">
					<div class="panel panel-primary">
						<div class="panel-heading" style="text-align: center; font-size: 15px;">Masukkan username dan password anda</div>
						<div class="panel-body">
							<?php
							if(isset($pesan)){
								?>
								<div class="alert alert-danger">Username atau Password Salah!</div>
								<?php
							}
							?>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" required>
							</div>
						</div>
						<div class="panel-footer">
							<input class="btn btn-primary" type="submit" name="login" value="Login" style="display:block;width:100%;">
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>
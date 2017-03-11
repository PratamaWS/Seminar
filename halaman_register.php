<?php
require('connection.php');
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
				<form method="post" action="daftar.php">
					<div class="panel panel-primary">
						<div class="panel-heading" style="text-align: center; font-size: 15px;">Buat Akun Anda</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="email" required>
							</div>
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
							<input class="btn btn-primary" type="submit" name="register" value="Daftar" style="display:block;width:100%;">
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>
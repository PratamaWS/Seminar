<!DOCTYPE html>
<html>
<head>
	<title>Readmore</title>
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
			<div class="col-sm-12">
				<div class="panel panel-primary" id="panel">
					<div class="panel-heading" style="text-align: center; font-size: 22px;">
						Seminar	
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-4">
								<?php
								require 'connection.php';
								$ambil_data = mysqli_query($conn, "SELECT * FROM berita WHERE berita_id = '$_GET[id]'");
								$hasil_data = mysqli_fetch_array($ambil_data);

								$judul_berita  = $hasil_data['berita_judul'];
								$isi_berita    = $hasil_data['berita_isi'];
								$tgl    		= $hasil_data['berita_tanggal'];
								?>  

								<p><?=$hasil_data['berita_tanggal'];?></p>
								<h3><?php echo ($judul_berita);?><br><br>

									<!-- <img style="width: 400px; height: 300px;" src="<?php echo($gambar); ?>"><br><br><br> -->

									<h5><?php echo ($isi_berita);?></h5>

									<?php

									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
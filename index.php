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
			<div class="col-sm-12">
				<div class="panel panel-primary" id="panel">
					<div class="panel-heading" style="text-align: center; font-size: 22px;">
						Seminar	
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-4">
								<?php
								/*include 'connection.php';
								$batas = 6;
								$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";

								if ( empty( $pg ) ) {
									$posisi = 0;
									$pg = 1;
								} else {
									$posisi = ( $pg - 1 ) * $batas;
								}*/
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
										<div class="row-fluid">  
											<div class="span4">  
												<!-- <img  alt="300x200" src="<?=$hasil_data['gambar'];?>" style="width: 300px; height: 200px;">   -->
											</div>  
											<div class="span8">  
												<h2><?=$row['berita_judul'];?></h2>  
												<p><?=$row['berita_judul'];?></p>
												<p style="text-align:justify;"><?=substr($row['berita_isi'],0,300);?></p>
												<p>  
													<a href="halaman_readmore.php?&id=<?=$row['berita_id'];?>">Read more</a>   
												</p>  
											</div>     
										</div>  
										<hr>  
										<?php  
										/*$no++;*/
									}
									
								}
								?>
								</div>
								<div class="col-sm-4"></div>
								<div class="col-sm-4">
									<a href="login.php" class="btn btn-primary">Login</a>

									<a href="halaman_register.php" class="btn btn-success">Register</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<form method="post" action="simpan_data.php" name="form_tamu">
					<div class="panel panel-primary">
						<div class="panel-heading" style="text-align: center; font-size: 18px;">
							Tambah data
						</div> 
						<div class="panel-body">
							<table class="table table-hover">
								<tr>
									<div class="form-group">
										<td width="30%">
											<label>Judul Berita</label>
										</td>
										<td width="70%">
											<input id="target1" type="text" class="form-control" name="judul_berita" required placeholder="judul berita">
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label>Isi Berita</label>
										</td>
										<td>
											<input id="target2" type="text" class="form-control" name="isi_berita" required placeholder="isi berita">
										</td>
									</div>
								</tr>
							</table>
						</div>
						<div class="panel-footer" >
							<input id="add_data" class="btn btn-primary" type="submit" name="simpan" value="Simpan"  style="display:block;width:20%;">
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>
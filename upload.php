<?php
session_start();
require "connection.php";
$tablename = "datauser";
if(isset($_POST["upload"])){
	$user = $_SESSION['user'];
	$sql = "SELECT file_abs FROM datauser WHERE user= '$user'";
	$resultsql = mysqli_query($conn, $sql);
	$jumlah = mysqli_num_rows($resultsql);
	if ($jumlah > 0) {
		$_SESSION['alert'] = "Anda sudah upload abstrak!";
		header('location: halaman_user.php');
	}else{
		$judul_abs = $_POST['judul_abs'];
		/*$Caption = $_POST['Caption'];
		$Kategori = $_POST['Kategori'];
		$Tanggal_Agenda = $_POST['Tanggal_Agenda'];
		$Tempat_Agenda = $_POST['Tempat_Agenda'];
		$Kontak = $_POST['Kontak'];
		$Pelaksana = $_POST['Pelaksana'];
		*/
		$file_abs = $_FILES["berkas"]["name"];
		$filetmp = $_FILES["berkas"]['tmp_name'];
		$filepath = "berkas/".$file_abs;
		$keyword = $_POST['keyword'];
		$kategori = $_POST['kategori'];
		$author1 = $_POST['author1'];
		$author1abs = $_POST['author1abs'];
		$author2 = $_POST['author2'];
		$author2abs = $_POST['author2abs'];
		$author3 = $_POST['author3'];
		$author3abs = $_POST['author3abs'];
		$author4 = $_POST['author4'];
		$author4abs = $_POST['author4abs'];
		$author5 = $_POST['author5'];
		$author5abs = $_POST['author5abs'];
		/*$tanggal_ditambahkan = NOW();*/
		
		if(move_uploaded_file($filetmp, $filepath)){
			$sql = "INSERT INTO $tablename (judul_abs, user, file_abs, keyword, kategori, author1, author1abs, author2, author2abs, author3, 
								author3abs, author4, author4abs, author5, author5abs, tanggal_ditambahkan, status_lolos, status_bayar, status_mak) 
			VALUES ('$judul_abs', '$user',  '$file_abs', '$keyword', '$kategori', '$author1','$author1abs','$author2', '$author2abs','$author3',
			 		'$author3abs', '$author4', '$author4abs', '$author5', '$author5abs',NOW(),'Belum diverifikasi', 'Belum', 'Belum')";
			$query = mysqli_query($conn, $sql);
			if($query){
				?>
				<script>
					alert ("Abstrak berhasil diupload");
					/*window.location.href='halaman_user.php';*/
				</script>
				<?php				
			}
			else{
				?>
				<script>
					alert ("Abstrak gagal diupload");
					window.location.href='halaman_user.php';
				</script>
				<?php	
			}
		}
	}
	
}
?>
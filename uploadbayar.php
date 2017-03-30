<?php
session_start();
require "connection.php";
$tablename = "datauser";
if(isset($_POST["uploadbayar"])){
	$user = $_SESSION['user'];
	$sql = "SELECT * FROM datauser WHERE user= '$user' AND status_lolos='Belum'";
	$resultsql = mysqli_query($conn, $sql);
	$jumlah = mysqli_num_rows($resultsql);
	if ($jumlah > 0) {
		$_SESSION['alert2'] = "Anda Tidak Lolos Abstrak!";
		header('location: buktibayar.php');
	}else{
		$user = $_SESSION['user'];
		$file_bayar = $_FILES["bayar"]["name"];
		$filetmp = $_FILES["bayar"]['tmp_name'];
		$filepath = "uploads/bayar/".$file_bayar;	
		if(move_uploaded_file($filetmp, $filepath)){
			$sql = "UPDATE $tablename SET file_bayar='$file_bayar', tanggal_bayar = NOW() WHERE user = '$user'";
			$query = mysqli_query($conn, $sql);
			if($query){
				$_SESSION['alert'] = "File berhasil diupload";
				header("location: buktibayar.php");			
			}	
			else{
				$_SESSION['alert2'] = "File gagal diupload";
				header("location: buktibayar.php");
			}
		}
	}
	
}
?>
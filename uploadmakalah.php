<?php
session_start();
require "connection.php";
$tablename = "datauser";
if(isset($_POST["uploadmakalah"])){
	$user = $_SESSION['user'];
	$sql = "SELECT * FROM datauser WHERE user= '$user' AND status_bayar='Belum'";
	$resultsql = mysqli_query($conn, $sql);
	$jumlah = mysqli_num_rows($resultsql);
	if ($jumlah>0) {
		$_SESSION['alert2'] = "Anda Belum Dikonfirmasi oleh Admin!";
		header('location: kelolamakalah.php');
	}else{
		$sql = "SELECT * FROM datauser WHERE user= '$user' AND status_mak='Sudah'";
		$resultsql = mysqli_query($conn, $sql);
		$jumlah = mysqli_num_rows($resultsql);
		if ($jumlah>0) {
			$_SESSION['alert2'] = "Anda Sudah Upload Makalah!";
			header('location: kelolamakalah.php');
		}else{
			$file_mak = $_FILES["makalah"]["name"];
			$filetmp = $_FILES["makalah"]['tmp_name'];
			$filepath = "uploads/makalah/".$file_mak;	
			if(move_uploaded_file($filetmp, $filepath)){
				$sql = "UPDATE $tablename SET file_mak='$file_mak', tanggal_mak = NOW(), status_mak='Sudah' WHERE user = '$user' ";
				$query = mysqli_query($conn, $sql);
				if($query){
					$_SESSION['alert'] = "File berhasil diupload";
					header("location: kelolamakalah.php");			
				}
				else{
					$_SESSION['alert2'] = "File gagal diupload";
					header("location: kelolamakalah.php");
				}	
			}	
		}
			
	}
	
	
}
?>
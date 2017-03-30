<?php
session_start();
require "connection.php";
$tablename = "datanp";
if(isset($_POST["uploadbayar"])){
	$user = $_SESSION['user'];
	$file_bayar = $_FILES["bayar"]["name"];
	$filetmp = $_FILES["bayar"]['tmp_name'];
	$filepath = "uploads/bayar/".$file_bayar;	
	if(move_uploaded_file($filetmp, $filepath)){
		$sql = "UPDATE $tablename SET file_bayar='$file_bayar', tanggal_bayar = NOW(), status_bayar='Sudah' WHERE username = '$user'";
		$query = mysqli_query($conn, $sql);
		if($query){
			$_SESSION['alert'] = "File berhasil diupload";
			header("location: halaman_np.php");			
		}	
		else{
			$_SESSION['alert2'] = "File gagal diupload";
			header("location: halaman_np.php");
		}
	}	
}
?>
<?php
session_start();
require "connection.php";
$tablename = "datauser";
if(isset($_POST["uploadmakalah"])){
	$user = $_SESSION['user'];
	$file_mak = $_FILES["makalah"]["name"];
	$filetmp = $_FILES["makalah"]['tmp_name'];
	$filepath = "uploads/makalah/".$file_mak;	
	if(move_uploaded_file($filetmp, $filepath)){
		$sql = "UPDATE $tablename SET file_mak='$file_mak', tanggal_mak = NOW() WHERE user = '$user' ";
		$query = mysqli_query($conn, $sql);
		if($query){
			$_SESSION['alert'] = "File berhasil diupload";
			header("location: kelolamakalah.php");			
		}
		else{
			$_SESSION['alert'] = "File gagal diupload";
			header("location: kelolamakalah.php");
		}	
	}
}
?>
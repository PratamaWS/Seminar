<?php
include_once 'securimage/securimage.php';

if (!isset($_SESSION['user'])){
	session_start();
}
require('connection.php');
if(isset($_POST['register'])){
	$securimage = new Securimage();
    if ($securimage->check($_POST['captcha_code'])==false){
	    $_SESSION['alert'] = "Kode captcha tidak tepat";
	    header("location: daftar_np.php");
  	} else{
  		$regex 			='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
		$email   		= $_POST['email'];
		$username       = $_POST['username'];
		$instansi		= $_POST['instansi'];
		$nama			= $_POST['nama'];
		$alamat			= $_POST['alamat'];
		$no_hp			= $_POST['no_hp'];
		$password       = $_POST['password'];
		$password2		= $_POST['password2'];
		if (preg_match($regex, $email)) {
			$sql = "SELECT * FROM user WHERE user_email = '$email'";
			$resultsql = mysqli_query($conn, $sql);
			$jumlah = mysqli_num_rows($resultsql);
			if ($jumlah > 0) {
				$_SESSION['alert'] = "Email sudah ada";
	    		header("location: daftar_np.php");
			}else{
				$sql = "SELECT * FROM user WHERE user_name = '$username'";
				$resultsql = mysqli_query($conn, $sql);
				$jumlah = mysqli_num_rows($resultsql);
				if ($jumlah > 0) {
					$_SESSION['alert'] = "Username sudah ada";
		    		header("location: daftar_np.php");
				}else{
					if($password==$password2){
						$sql = "INSERT INTO user (user_name, user_password, user_email, user_create_date, user_status ) 
						VALUES ('$username', '$password', '$email', NOW(), 3)";
						mysqli_query($conn, $sql);
						$sql2 = "INSERT INTO datanp (username, nama_lengkap, instansi, alamat, no_hp, email, status_bayar) 
						VALUES ('$username', '$nama', '$instansi', '$alamat', '$no_hp','$email','Belum')";
						mysqli_query($conn, $sql2);
						$_SESSION['alert2'] = "Akun Berhasil Dibuat, silahkan login <a href='login.php'>disini</a>";
		    			header("location: daftar_np.php");
					}else{ 
					 	$_SESSION['alert'] = "Password tidak sama, silahkan ketik ulang password anda!";
		    			header("location: daftar_np.php");
					}			
				}
			}
		} else{
			$_SESSION['alert'] = "Email tidak valid!";
	    	header("location: daftar_np.php");
		}		
  	}
	
}
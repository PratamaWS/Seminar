<?php
include('db.php');
include('function.php');
date_default_timezone_set('Asia/Jakarta');
$berita_tanggal= date("d/m/Y h:i:s");

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO berita (berita_judul, berita_isi,berita_tanggal, image) 
			VALUES (:berita_judul, :berita_isi, :berita_tanggal, :image)
		");
		$result = $statement->execute(
			array(
				':berita_judul'	=>	$_POST["berita_judul"],
				':berita_isi'	=>	$_POST["berita_isi"],
				':berita_tanggal'	=>	$berita_tanggal,
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE berita
			SET berita_judul = :berita_judul, berita_isi = :berita_isi, berita_tanggal = :berita_tanggal,image = :image  
			WHERE berita_id = :berita_id
			"
		);
		$result = $statement->execute(
			array(
				':berita_judul'	=>	$_POST["berita_judul"],
				':berita_isi'	=>	$_POST["berita_isi"],
				':berita_tanggal'	=>	$berita_tanggal,
				':image'		=>	$image,
				':berita_id'			=>	$_POST["berita_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
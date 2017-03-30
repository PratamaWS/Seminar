<?php
	include "koneksi.php";
	$id_user=$_POST['id_user'];
	$query=mysql_query("select * from datauser where user_id=$user_id");
	$array = array();
	while($data = mysql_fetch_array($query)){
		$array['user_id']= $data['user_id'];
		$array['author1']= $data['author1'];
		$array['judul_abs']= $data['judul_abs'];
		$array['kategori']= $data['kategori'];

	}
	echo json_encode($array);
?>
<?php
	include "koneksi.php";
	$kategori_id=$_POST['kategori_id'];
	$query=mysql_query("select * from kategori where kategori_id=$kategori_id");
	$array = array();
	while($data = mysql_fetch_array($query)){
		$array['kategori_id']= $data['kategori_id'];
		$array['kategori_nama']= $data['kategori_nama'];
	}
	echo json_encode($array);
?>
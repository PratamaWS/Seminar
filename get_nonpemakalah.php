<?php
	include "koneksi.php";
	$id_np=$_POST['id_np'];
	$query=mysql_query("select * from datanp where id_np=$id_np");
	$array = array();
	while($data = mysql_fetch_array($query)){
		$array['id_np']= $data['id_np'];
		$array['nama_lengkap']= $data['nama_lengkap'];
		$array['instansi']= $data['instansi'];
	}
	echo json_encode($array);
?>
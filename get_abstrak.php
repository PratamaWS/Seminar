<?php
	include "koneksi.php";
	$berita_id=$_POST['id_data'];
	$query=mysql_query("select * from datauser where id_data=$id_data");
	$array = array();
	while($data = mysql_fetch_array($query)){
		$array['id_data']= $data['id_data'];
		$array['nama_aut']= $data['nama_aut'];
		$array['judul_abs']= $data['judul_abs'];
		$array['file_abs']= $data['file_abs'];
		$array['satatus_lolos']= $data['status_lolos'];
		$array['satatus_bayar']= $data['status_bayar'];
	}
	echo json_encode($array);
?>

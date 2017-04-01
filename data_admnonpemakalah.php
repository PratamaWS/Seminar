<?php
	include "koneksi.php";
	$query=mysql_query("SELECT * FROM datanp ");
	$data = array();
	while($r = mysql_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {

		$data[$i]['btnhps'] = '
		<button type="submit" username="'.$data[$i]['username'].'" nama_lengkap="'.$data[$i]['nama_lengkap'].'" class="btn btn-primary btnhapus" ><i class="fa fa-remove"></i></button>';
		$i++;
	}
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
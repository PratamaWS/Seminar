<?php
	include "koneksi.php";
	$query=mysql_query("SELECT * FROM datauser ");
	$data = array();
	while($r = mysql_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {

		$data[$i]['btnhps'] = '
		<button type="submit" id_data="'.$data[$i]['id_data'].'" judul_abs="'.$data[$i]['judul_abs'].'" class="btn btn-primary btnhapus" ><i class="fa fa-remove"></i></button>';
		$i++;
	}
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
<?php
	include "koneksi.php";
	$query=mysql_query("SELECT * FROM datauser WHERE status_mak='Sudah'");
	$data = array();
	while($r = mysql_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
		$data[$i]['btnabstrak'] = '<a href="uploads/abstrak/'.$data[$i]['file_abs'].'" class="btn btn-default "><i class="fa fa-download "></i></a>';
		$data[$i]['btnpaper'] = '<a href="uploads/makalah/'.$data[$i]['file_mak'].'" class="btn btn-default "><i class="fa fa-download "></i></a>';
		$i++;
	}
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
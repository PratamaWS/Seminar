<?php
	include "koneksi.php";
	$query=mysql_query("SELECT id_data, user, judul_abs, file_abs, status_lolos, status_bayar
		FROM datauser WHERE status_bayar = 'Belum' AND status_lolos = 'Lolos'"); 
	$data = array();
	while($r = mysql_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
		$data[$i]['download'] = '<a href="uploads/abstrak/'.$data[$i]['file_abs'].'" class="btn btn-primary btnedit"><i class="fa fa-download "></i></a>';
		$data[$i]['cekbayar'] = '<input type="checkbox"  id_data="'.$data[$i]['id_data'].'" status_bayar="'.$data[$i]['status_bayar'].'"class="btn btn-primary btnedit"></button>';
		$i++;
	}
	$datax = array('data' => $data);
	echo json_encode($datax);
?>

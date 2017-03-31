<?php
	include "koneksi.php";
	$query=mysql_query("SELECT id_data,user, judul_abs, file_mak, status_mak
		FROM datauser WHERE status_lolos = 'Lolos' AND status_bayar = 'Sudah' AND status_mak = 'Sudah'"); 
	$data = array();
	while($r = mysql_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
		$data[$i]['download'] = '<a href="uploads/makalah/'.$data[$i]['file_mak'].'" class="btn btn-primary btnedit"><i class="fa fa-download "></i></a>';
		$data[$i]['cekmenang'] = '<input type="checkbox"  id_data="'.$data[$i]['id_data'].'" user="'.$data[$i]['user'].'" status_mak="'.$data[$i]['status_mak'].'"class="btn btn-primary btnedit"></button>';
		$i++;
	}
	$datax = array('data' => $data);
	echo json_encode($datax);
?>

<?php
	include "koneksi.php";
	$query=mysql_query("SELECT username, nama_lengkap, file_bayar, status_bayar,instansi, no_hp
		FROM datanp WHERE status_bayar = 'Belum' AND file_bayar != ''"); 
	$data = array();
	while($r = mysql_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
		$data[$i]['download'] = '<a href="uploads/bayar/'.$data[$i]['file_bayar'].'" class="btn btn-primary btnedit"><i class="fa fa-download "></i></a>';
		$data[$i]['cekbayar'] = '<input type="checkbox"  username="'.$data[$i]['username'].'" status_bayar="'.$data[$i]['status_bayar'].'"class="btn btn-primary btnedit"></button>';
		$i++;
	}
	$datax = array('data' => $data);
	echo json_encode($datax);
?>

<?php
include "koneksi.php";
$query=mysql_query("SELECT @rownum := @rownum + 1 AS urutan,t. id_data, nama_aut, judul_abs, file_abs, status_lolos, status_bayar
	FROM datauser  /*WHERE status_lolos = 'Lolos' */t, 
(SELECT @rownum := 0) r");
$data = array();
while($r = mysql_fetch_assoc($query)) {
	$data[] = $r;
}

$i=0;
foreach ($data as $key) {
		// add new button
	$data[$i]['button'] = '<button type="submit" id_data="'.$data[$i]['id_data'].'" class="btn btn-primary btnedit" ><i class="fa fa-check-square-o "></i></button>';
	$data[$i]['download'] = '<a href="uploads/'.$data[$i]['file_abs'].'" class="btn btn-primary btnedit"><i class="fa fa-download "></i></a>';
	$data[$i]['ceklolos'] = '<input type="checkbox"  id_data="'.$data[$i]['id_data'].'" status_lolos="'.$data[$i]['status_lolos'].'"class="btn btn-primary btnedit"></button>';
	$i++;
}
$datax = array('data' => $data);
echo json_encode($datax);
?>

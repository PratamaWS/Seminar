<?php
	include "koneksi.php";
	$query=mysql_query("SELECT @rownum := @rownum + 1 AS urutan,t.*
		FROM kategori t, 
		(SELECT @rownum := 0) r");
	$data = array();
	while($r = mysql_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
		$data[$i]['button'] = '<button type="submit" kategori_id="'.$data[$i]['kategori_id'].'" class="btn btn-primary btnedit" ><i class="fa fa-edit"></i></button> 
		<button type="submit" kategori_id="'.$data[$i]['kategori_id'].'" kategori_nama="'.$data[$i]['kategori_nama'].'" class="btn btn-primary btnhapus" ><i class="fa fa-remove"></i></button>';
		$i++;
	}
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
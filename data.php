<?php
	include "koneksi.php";
	$query=mysql_query("SELECT @rownum := @rownum + 1 AS urutan,t.*
		FROM berita t, 
		(SELECT @rownum := 0) r");
	$data = array();
	while($r = mysql_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
		$data[$i]['button'] = '<button type="submit" berita_id="'.$data[$i]['berita_id'].'" class="btn btn-primary btnedit" ><i class="fa fa-edit"></i></button> 
		<button type="submit" berita_id="'.$data[$i]['berita_id'].'" berita_judul="'.$data[$i]['berita_judul'].'" class="btn btn-primary btnhapus" ><i class="fa fa-remove"></i></button>';
		$i++;
	}
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
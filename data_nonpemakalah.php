<?php
	include "koneksi.php";
	$query=mysql_query("SELECT * FROM datanp");
	$data = array();
	while($r = mysql_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
		$i++;
	}
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
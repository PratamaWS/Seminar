<?php
include "koneksi.php";
$query=mysql_query("SELECT @rownum := @rownum + 1 AS urutan,t.*
	FROM datauser t, 
	(SELECT @rownum := 0) r");
$data = array();
while($r = mysql_fetch_assoc($query)) {
	$data[] = $r;
}
$i=0;
foreach ($data as $key) {
		// add new button
	$data[$i]['button'] = '<button type="submit" id_data="'.$data[$i]['id_data'].'" class="btn btn-primary btnedit" ><i class="fa fa-check-square-o "></i></button>';
	$data[$i]['download'] = '<a href="uploads/'.$row['file_abs'].'" class="btn btn-primary btn-sm">Download</a>';
	$i++;
}
$datax = array('data' => $data);
echo json_encode($datax);
?>

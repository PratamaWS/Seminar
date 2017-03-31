<?php
	include "koneksi.php";
	$id_np = $_POST['id_np'];
	mysql_query("delete from datanp where id_np=$id_np");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
	echo json_encode($result);
?>
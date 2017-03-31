<?php
	include "koneksi.php";
	$id_data = $_POST['id_data'];
	mysql_query("delete from datauser where id_data=$id_data");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
	echo json_encode($result);
?>
<?php
	include "koneksi.php";
	$berita_id = $_POST['berita_id'];
	mysql_query("delete from berita where berita_id=$berita_id");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
	echo json_encode($result);
?>
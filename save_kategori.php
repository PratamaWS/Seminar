<?php
include "koneksi.php";

$kategori_id = $_POST['kategori_id'];
$kategori_nama = $_POST['kategori_nama'];
$crud=$_POST['crud'];

if($crud=='N'){
	mysql_query("insert into kategori(kategori_nama) values('$kategori_nama')");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else if($crud == 'E'){
	mysql_query("update kategori set kategori_nama='$kategori_nama'where kategori_id=$kategori_id");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else{

	$result['error']='Invalid Order';
	$result['result']=0;
}
$result['crud']=$crud;
echo json_encode($result);

?>
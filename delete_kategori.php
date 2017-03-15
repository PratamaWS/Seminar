<?php
include "koneksi.php";

$kategori_id = $_POST['kategori_id'];

mysql_query("delete from kategori where kategori_id=$kategori_id");
if(mysql_error()){
	$result['error']=mysql_error();
	$result['result']=0;
}else{
	$result['error']='';
	$result['result']=1;
}
echo json_encode($result);

?>
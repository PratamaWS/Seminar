<?php
include "koneksi.php";

$berita_id = $_POST['berita_id'];
$berita_judul = $_POST['berita_judul'];
$berita_isi = $_POST['berita_isi'];
$berita_tanggal= date("Y-m-d");
$crud=$_POST['crud'];

if($crud=='N'){
	mysql_query("insert into berita(berita_judul,berita_isi,berita_tanggal) values('$berita_judul','$berita_isi','$berita_tanggal')");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else if($crud == 'E'){
	mysql_query("update berita set berita_judul='$berita_judul',berita_isi='$berita_isi',berita_tanggal='$berita_tanggal' where berita_id=$berita_id");
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
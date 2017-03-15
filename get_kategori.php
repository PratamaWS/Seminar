<?php
include "koneksi.php";

$berita_id=$_POST['berita_id'];
$query=mysql_query("select * from berita where berita_id=$berita_id");
$array = array();
while($data = mysql_fetch_array($query)){
	$array['berita_id']= $data['berita_id'];
	$array['berita_judul']= $data['berita_judul'];
	$array['berita_isi']= $data['berita_isi'];
	$array['berita_tanggal']= $data['berita_tanggal'];

}
echo json_encode($array);

?>
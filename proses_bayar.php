<?php
include "koneksi.php";

$status_bayar = $_POST['status_bayar'];
$id_data = $_POST['id_data'];


  mysql_query("update datauser set status_bayar='Sudah' where id_data=$id_data");
  if(mysql_error()){
    $result['error']=mysql_error();
    $result['result']=0;
  }else{
    $result['error']='';
    $result['result']=1;
  }

  echo json_encode($result);
?>
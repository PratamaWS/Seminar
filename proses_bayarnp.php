<?php
include "koneksi.php";

$status_bayar = $_POST['status_bayar'];
$username = $_POST['username'];


  mysql_query("update datanp set status_bayar='Sudah' where username='$username'");
  if(mysql_error()){
    $result['error']=mysql_error();
    $result['result']=0;
  }else{
    $result['error']='';
    $result['result']=1;
  }

  echo json_encode($result);
?>
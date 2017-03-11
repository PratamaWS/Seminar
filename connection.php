<?php
	date_default_timezone_set("Asia/Jakarta");
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "seminar";
	$conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(!$conn) {
		die("Connection failed" . mysqli_connect_error());
	}
?>
<?php

include('db.php');
include("function.php");

if(isset($_POST["berita_id"]))
{
	$image = get_image_name($_POST["berita_id"]);
	if($image != '')
	{
		unlink("uploads/berita/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM berita WHERE berita_id = :berita_id"
	);
	$result = $statement->execute(
		array(
			':berita_id'	=>	$_POST["berita_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>
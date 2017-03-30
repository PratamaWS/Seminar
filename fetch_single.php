<?php
include('db.php');
include('function.php');
if(isset($_POST["berita_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM berita 
		WHERE berita_id = '".$_POST["berita_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["berita_judul"] = $row["berita_judul"];
		$output["berita_isi"] = $row["berita_isi"];
		$output["berita_tanggal"] = $row["berita_tanggal"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="uploads/berita/'.$row["image"].'" class="img-thumbnail" width="200" height="100" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>
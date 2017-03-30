<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM berita ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE berita_judul LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR berita_isi LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY berita_id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="uploads/berita/'.$row["image"].'" class="img-thumbnail" width="100" height="50" />';
	}
	else
	{
		$image = '';
	}
$sub_array = array();
	$sub_array[] = $image;
	$sub_array[] = $row["berita_judul"];
	$sub_array[] = $row["berita_isi"];
	$sub_array[] = $row["berita_tanggal"];
	$sub_array[] = '<button type="button" name="update" berita_id="'.$row["berita_id"].'" class="btn btn-primary update"><i class="fa fa-edit"></i></button>';
	$sub_array[] = '<button type="button" name="delete" berita_id="'.$row["berita_id"].'" class="btn btn-primary delete"><i class="fa fa-remove"></i></button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>
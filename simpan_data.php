<?php
if (!isset($_SESSION['user'])){
	session_start();
}
require('connection.php');
if(isset($_POST['simpan'])){
	$judul_berita     = $_POST['judul_berita'];
	$isi_berita       = $_POST['isi_berita'];

	$sql = "INSERT INTO berita (berita_judul, berita_isi, berita_tanggal) 
	VALUES ('$judul_berita', '$isi_berita', NOW())";
	mysqli_query($conn, $sql);
	?>
	<script>
		alert("Berita berhasil ditambahkan!");
		window.location.href='index.php';
	</script>
	<?php	
}
?>
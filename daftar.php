<?php
include_once 'securimage/securimage.php';

if (!isset($_SESSION['user'])){
	session_start();
}
require('connection.php');
if(isset($_POST['register'])){
	$securimage = new Securimage();

	  if ($securimage->check($_POST['captcha_code'])==false){
	    ?>
	      <script type="text/javascript">
	        alert ("Kode Captcha Tidak Tepat!");
	        document.location.href='javascript:history.go(-1)';
	      </script>
	    <?php
	    /*echo "<a href='javascript:history.go(-1)'> Try Again</a>.";*/
	    exit;
	  }
	$regex 		='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
	$email   		= $_POST['email'];
	$username       = $_POST['username'];
	$password       = $_POST['password'];
	$password2		= $_POST['password2'];
	if (preg_match($regex, $email)) {

		$sql = "SELECT * FROM user WHERE user_name = '$username'";
		$resultsql = mysqli_query($conn, $sql);
		$jumlah = mysqli_num_rows($resultsql);
		if ($jumlah > 0) {
			?>
			<script>
				alert("Username sudah ada!");
				window.location.href='halaman_register.php';
			</script>
			<?php
		}else{
			if($password==$password2){
				$sql = "INSERT INTO user (user_name, user_password, user_email, user_create_date, user_status ) 
				VALUES ('$username', '$password', '$email', NOW(), 2)";
				mysqli_query($conn, $sql);
				?>
				<script>
					alert("Akun berhasil dibuat");
					window.location.href='login.php';
				</script>
				<?php
			}else{ 
			 	?>
				<script>
					alert("Password tidak sama, mohon ketik ulang password anda");
					window.location.href='halaman_register.php';
				</script>
				<?php
			}
			
		}
	} else{
		?>
		<script>
			alert ("Email anda tidak valid!!");
			window.location.href='halaman_register.php';
		</script>    
		<?php	
	}		
}
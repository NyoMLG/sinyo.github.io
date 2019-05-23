<?php 
session_start();
include 'koneksi.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login pelanggan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>


<div class="container">
	<div class="row">
		<div class="col-md-4">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					

					
					<h3 class="panel-title"> Login Pelanggan</h3>
				</div>
				<div class="panel-body">
					<form method="post">
						
						<div class="form-group">
							<label>E-mail</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="pass"class="form-control "name="password">
						</div>
						<button class="btn btn-primary" name="login">login</button>
					</form>







				</div>
			</div>


		</div>
	</div>

</div>


<?php 

if (isset($_POST["login"]))
{
	$email = $_POST["email"];
	$password = $_POST["password"];
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");


	$akunyangcocok = $ambil->num_rows;

	if ($akunyangcocok==1)
	{
		$akun = $ambil->fetch_assoc();
		$_SESSION["pelanggan"] = $akun;

		echo "<script>alert('SUCCESS LOGIN');</script>";


		if(isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
	{

		echo "<script>location='checkout.php';</script>";
	}
	else
	{
		echo "<script>location='riwayat.php';</script>";
	}

		
	}
	else
	{
		echo "<script>alert('anda gagal Login,periksa akun anda');</script>";
		echo "<script>location='login.php';</script>";
	}



}




 ?>



</body>
</html>
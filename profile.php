<?php include 'koneksi.php'; 
session_start();?>



<!DOCTYPE html>
<html>
<head>
	<title>PROFILE</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<?php include 'menu.php'; ?>

	<?php 
	$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
	$ambil = $koneksi->query("SELECT * FROM pelanggan");
	($detail = $ambil->fetch_assoc())


	?>






	<pre><?php print_r($_SESSION) ?></pre>



	<div class="row">
		<div class="col-md-7">

			<h1>&nbsp;&nbsp;&nbsp;PROFILE  </h1>



			



			<div class="tumbnail" >
				<img src="profile/<?php echo $_SESSION["pelanggan"]["ftprofile"]; ?>" width='200'"></div>


			</div>
			<div class="col-md-5">
				<h2>Nama : <strong><?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></strong><br></h2>

				<h2>E-Mail : <strong><?php echo $_SESSION["pelanggan"]["email_pelanggan"]; ?></strong><br></h2>

				<h2>Password : <strong><?php echo $_SESSION["pelanggan"]["password_pelanggan"]; ?></strong><br></h2>

				<h2>telephone : <strong><?php echo $_SESSION["pelanggan"]["telephone_pelanggan"]; ?></strong><br></h2>

				<h2>Alamat : <strong><?php echo $_SESSION["pelanggan"]["alamat_pelanggan"]; ?></strong><br></h2>







		</div>








	</div>




</section>


</body>
</html>
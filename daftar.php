<?php
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>.::DAFTAR::.</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<?php include 'menu.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">DAFTAR PELANGGAN</h3>
					</div>

					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>nama</label>
								<input type="text" class="form-control" name="nama">	
							</div>
							<div class="form-group">
								<label>E-Mail</label>
								<input type="email" class="form-control" name="email">	
							</div>
							<div class="form-group">
								<label>password</label>
								<input type="text" class="form-control" name="password">	
							</div>
							<div class="form-group">
								<label>NO Telp/HP</label>
								<input type="text" class="form-control" name="telp">	
							</div>
							<div class="form-group">
								<label>alamat</label>
								<textarea class="form-control" name="alamat" rows='3'></textarea>
							</div>
							<div class="form-group">
								<label>foto format .JPG</label>
								<input type="file" class="form-control" name="foto">	
							</div>
							
							<button class="btn btn-primary"  name="save">SIMPAN</button>
						</form>

						<?php 
						if (isset($_POST['save']))

						{
							$nama = $_FILES['foto']['name'];
							$lokasi = $_FILES['foto']['tmp_name'];
							move_uploaded_file($lokasi, "profile/" .$nama);
							$koneksi->query("INSERT INTO pelanggan
								(email_pelanggan,password_pelanggan,nama_pelanggan,telephone_pelanggan,alamat_pelanggan,ftprofile)
								VALUES('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telp]','$_POST[alamat]','$nama')");




							echo "<script>alert('Registrasi sukses');</script>";
							echo "<script>location='login.php';</script>";
							exit();
						}
						?>






					</div>
				</div>
			</div>
		</div>



	</body>
	</html>
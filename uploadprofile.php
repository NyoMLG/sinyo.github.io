<?php 
if (isset($_POST['save']))

{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_profile/" .$nama);
	$koneksi->query("INSERT INTO pelanggan
		(email_pelanggan,password_pelanggan,nama_pelanggan,telephone_pelanggan,alamat_pelanggan,ftprofile)
		VALUES('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telp]','$_POST[alamat]','$_POST[foto]')");

	
}
?>
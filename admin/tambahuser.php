<h2>Tambah User</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">	
	</div>
	<div class="form-group">
		<label>E-Mail</label>
		<input type="text" class="form-control" name="harga">	
	</div>
	<div class="form-group">
		<label>password</label>
		<input type="text" class="form-control" name="berat">	
	</div>
	<div class="form-group">
		<label>Telephone</label>
		<input type="text" class="form-control" name="telephone">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" class="form-control" name="stock">	
	</div>
		<div class="form-group">
		<label>foto format .JPG</label>
		<input type="file" class="form-control" name="foto">	
	</div>
	<button class="btn btn-primary" name="save">SIMPAN</button>
	
</form>


<?php 
if (isset($_POST['save']))

{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/" .$nama);
	$koneksi->query("INSERT INTO produk
		(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stock_produk)
		VALUES('$_POST[nama]','$_POST[berat]','$_POST[stock]','$nama','$_POST[deskripsi]','$_POST[stock]')");

		echo "<div class='alert alert-info'> DATA TERSIMPAN </div>";
 		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
 }
 ?>




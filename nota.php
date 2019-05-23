<?php 
session_start();
include 'koneksi.php';

?>



<!DOCTYPE html>
<html>
<head>
	<title>NOTA PEMBELIAN</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		
		<h2>data pembelian</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
 ?>



 <?php 
 $idpelanggganyangbeli = $detail["id_pelanggan"];
 $idpelanggganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

 if($idpelanggganyangbeli!==$idpelanggganyanglogin)

 {
 	echo "<script>alert('DANGEROUS');</script>";
 	echo "<script>location='riwayat.php';</script>";
 }

  ?>


 
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong> No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
		Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
		Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
	</div>
	<div class="col-md-4">
	<h3>Pelanggan</h3>
	<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
<p>
 	<?php echo $detail['telephone_pelanggan']; ?><br>
 	<?php echo $detail['email_pelanggan']; ?>
</p>
</div>
	<div class="col-md-4"></div>
	<h3>Pengiriman</h3>
	<strong><?php echo $detail['nama_prov']; ?></strong>
	Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?>"<br>
	Alamat : <?php echo $detail['alamat_pengiriman']; ?>
</div>



<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>berat</th>
			<th>jumlah</th>
			<th>subberat</th>
			<th>subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'") ; ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['berat']; ?>Gram</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?>Gram.</td>
			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
				<strong> BANK BRI 14045-000-0000 AN. Sinyo Sec</strong>
			</p>
		</div>
	</div>
</div>

		
	</div>




</section>

</body>
</html>
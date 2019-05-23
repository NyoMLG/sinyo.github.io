<?php 
session_start();
include 'koneksi.php';


if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))

{

	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_beli)
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>

<div class="container">
	<h2>Konfirmasi pembayaran</h2>
	<p>Kirim Bukti Pembayaran Anda Disini</p>
	<div class="alert alert-info"> TOTAL tagihan anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

<form method="post" enctype="multipart/form-data">
	<div class="form-gorup">
		<label>Nama Penyetor</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-gorup">
		<label>BANK</label>
		<input type="text" class="form-control" name="bank">
	</div>
	<div class="form-gorup">
		<label>Jumlah</label>
		<input type="number" class="form-control" name="jumlah" min="1">
	</div>
	<div class="form-gorup">
		<label>Foto BUkti Pembayaran</label>
		<input type="file" class="form-control" name="bukti">
		<p class="text-danger"> Foto Bukti harus .JPG Max 2MB</p>
	</div>
	<button class="btn btn-primary" name="kirim">Kirim</button>
</form>

</div>


<?php 

if (isset($_POST["kirim"]))
{

	$namabukti = $_FILES["bukti"]["name"];
	$lokasibukti = $_FILES["bukti"]["tmp_name"];
	$namafiks = date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah=$_POST["jumlah"];
	$tanggal = date("Y-m-d");

	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
		VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");



	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' 
		WHERE id_pembelian='$idpem'");



echo "<script>alert('Terima Kasih Telah Mengirim Bukti Pembayaran');</script>";
echo "<script>location='riwayat.php';</script>";
	exit();

}
 ?>

</body>
</html>
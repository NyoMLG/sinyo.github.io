<?php 
session_start();
include 'koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>TOKO TEKNO SINYO{NyoSec}</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="js/ratingstar.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/
</head>
<body>


	<?php include 'menu.php'; ?>

	<section class="konten">
		<div class="container">
			<h1>PRODUK TERBARU Techno {NyoSec}</h1>

			<div class="row">


				<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
				<?php while ($perproduk = $ambil->fetch_assoc()){ ?>



					<div class="col-md-3"> 
						<div class="tumbnail" >
							<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>"  width='200'">
							<div class="caption">
								<h3><?php echo $perproduk['nama_produk']; ?> </h3>
								<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
								<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>	" class="btn btn-primary">Beli</a>
								<a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-default">Detail</a>
							</div>
						</div>
					</div>
					
			

			<?php } }?>

		</div>

	</div>

</section>
<script
https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- star js -->
<script src="js/ratingstar.js"></script>
<!-- ajax -->
<script>
// rating
var rate;
$('#rating-student').starrr({
	change: function(e, value){ 
		rate = value;  	       
		if (value) {
			$('.your-choice-was').show();      
		} else {
			$('.your-choice-was').hide();
		}
	}
});
// ajax submit
$("#submit").click(function(){	
	var name = $('#name').val();
	var email = $('#email').val();	
	$.ajax({		
		url: "rating.php",
		type: 'post',
		data: {v1 : name, v2 : email, v3 : rate},
		success: function (status) {
			if(status == 1){
				$('.msg').html('<b>Student Inserted !</b>');
			}else{
				$('.msg').html('<b>Server side error !</b>');        		
			}
		}
	});

});
</script>


</body>
</html>
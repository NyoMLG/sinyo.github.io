<h2>DATA PELANGGAN</h2> <a href="index.php?halaman=tambahuser" class="btn btn-primary">Tambah Data</a><br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>email</th>
			<th>password</th>
			<th>telephone</th>
			<th>aksi</th>

		</tr>
	</thead>

	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan") ?>
		<?php while ($pecah=$ambil ->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah["nama_pelanggan"]; ?></td>
			<td><?php echo $pecah["email_pelanggan"]; ?></td>
			<td><?php echo $pecah["password_pelanggan"]; ?></td>
			<td><?php echo $pecah["telephone_pelanggan"]; ?></td>
			<td>
				<a href="" class="btn btn-danger">DELETE</a>


			</td>
		</tr>
	<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>